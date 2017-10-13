#!/usr/bin/php
<?php 

require 'vendor/autoload.php';


$timezone = 'America/Los_Angeles';

date_default_timezone_set($timezone);

$dsn = 'mysql:dbname=BPMGroup;host=bpmgroup.cnpa18oqfs1f.us-west-2.rds.amazonaws.com;port=3306';
$username = 'BPMGroup';
$password = 'gobpmgo911';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

echo "\n". date('Y-m-d H:i:s') . ":-  ";

try {
    $db = new PDO($dsn, $username, $password, $options); // also allows an extra parameter of configuration
    $db->exec("SET time_zone = '{$timezone}'");
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

try {

	$times = $db->query("Select DATE_ADD(NOW() , INTERVAL -5 MINUTE) AS START_TIME, DATE_ADD(NOW() , INTERVAL 5 MINUTE) AS END_TIME");

	$times = $times->fetch(PDO::FETCH_ASSOC);

	echo "Schedualing Email Between ".$times['START_TIME']." - ".$times['END_TIME']."\n";

	$statement = "
	    SELECT BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.ODESSO_APP_MODULE_STORE_ORDER_ID,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.ODESSO_APP_ID,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.LOCATION_SCHEDULE,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.SCHEDULE_TIME,
	       DATE_ADD(BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.SCHEDULE_TIME , INTERVAL -1 DAY) AS REMINDER_TIME,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.STATUS,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.ORDER_CONFIRMATION_CODE,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER_AUDIT.ODESSO_END_USER_ID,
	       BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER_AUDIT.USER_TYPE,
	       BPMGroup._PROD_ODESSO_END_USER.EMAIL,
	       BPMGroup._PROD_ODESSO_END_USER.FIRST_NAME,
	       BPMGroup._PROD_ODESSO_END_USER.LAST_NAME
		FROM BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER
		JOIN BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER_AUDIT ON BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.ODESSO_APP_MODULE_STORE_ORDER_ID = BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER_AUDIT.ODESSO_APP_MODULE_STORE_ORDER_ID
		JOIN BPMGroup._PROD_ODESSO_END_USER ON BPMGroup._PROD_ODESSO_END_USER.ODESSO_END_USER_ID = BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER_AUDIT.ODESSO_END_USER_ID
		WHERE BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.ODESSO_APP_ID = 3
		  AND BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.STATUS = 'Finalizing'
		  AND BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER_AUDIT.USER_TYPE = 'Service Provider'
		  AND BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.LOCATION_SCHEDULE = 'Future time'
		  AND DATE_ADD(BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.SCHEDULE_TIME , INTERVAL -1 DAY) BETWEEN NOW() - INTERVAL 5 MINUTE AND NOW() + INTERVAL 5 MINUTE
		ORDER BY BPMGroup._PROD_ODESSO_APP_MODULE_STORE_ORDER.ODESSO_APP_MODULE_STORE_ORDER_ID
		";

	$orders = $db->query($statement);
	echo "Total Results Fetched :- ".$orders->rowCount(). " \n";

} catch(PDOException $e) {
    die('Error in Query please check:<br/>' . $e);
}

$message = "
Dear FIRST_NAME LAST_NAME,
<br><br>
This is a reminder for your upcoming shoot # ORDER_CONFIRMATION_CODE which is scheduled for tomorrow at SCHEDULE_TIME. 
<br>
If you have any questions please email support@fotogenieapp.com
<br><br>
Thanks, FotoGenieApp";

foreach($orders->FetchAll(PDO::FETCH_ASSOC) as $order) {

	$body = strtr($message, $order);
    
	$mail = new PHPMailer;
	
	$mail->setFrom('support@fotogenieapp.com ', 'FotoGenie');
	
	$mail->addAddress($order['EMAIL'], $order['FIRST_NAME']." ".$order['LAST_NAME']);
	$mail->addBcc('prakashw3expert@gmail.com');
	
	$mail->Subject = 'Reminder: Confirm Your Shoot Scheduled for Tomorrow';
	
	$mail->msgHTML($body);

	if (!$mail->send()) {
	    echo "Mailer Error: " . $mail->ErrorInfo.'\n';
	} else {
	    echo "Message sent to ".$order['EMAIL']."<".$order['FIRST_NAME']." ".$order['LAST_NAME'].">  -- ORDER".$order['ORDER_CONFIRMATION_CODE']."\n";
	}
}
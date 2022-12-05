<?php 

$server='109.234.164.163';
$username='sc4shha6455_sms';
$password='Kiki2001@';
$database = 'sc4shha6455_sms';
$charset='utf8';

try {
	$bdd = new PDO('mysql:host='.$server.';dbname='.$database.';charset='.$charset, $username, $password);
} catch (PDOException $e) {
	echo "Error de connexion : ".$e->getMessage()."<br />";
}

?>
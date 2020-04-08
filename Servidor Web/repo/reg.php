<?php
	$ip = $_GET['ip'];
	$host = $_GET['host'];
	$time = time();		
	$username = $_GET['username'];
	$file='hosts/'.$ip.'.json';
	$id='2';

 if ($ip != '0.0.0.0') {
       	$archivo = fopen($file, "w+b");
	$registro= '{"Equipos": [{"id": '.$id.',"host": "'.$host.'","ip": "'.$ip.'","username": "'.$username.'","time": "'.$time.'"}]}';
	fwrite($archivo, $registro. PHP_EOL);
	fclose($archivo);
	include 'rdp.php';
  } 
?>

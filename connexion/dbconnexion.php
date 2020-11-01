<?php
	$host='localhost';
	$port=3306;
	$dbname='locationvoiture';
	$user='root';
	$pwd='';

	$db=new PDO("mysql:host=$host;port=$port;dbname=$dbname",$user,$pwd);
?>
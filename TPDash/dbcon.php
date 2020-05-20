<?php

	try{

		$con =  new PDO("mysql:host=localhost;dbname=tpcell","root","");

	}catch(PDOException $e){

		die("connection Failed....".$e->getmessage());
	}


?>
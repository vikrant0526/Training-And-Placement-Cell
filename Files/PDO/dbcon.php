<!-- 
try{

		$con =  new PDO("mysql:host=localhost;dbname=tpcell","root","");

	}catch(PDOException $e){

		die("connection Failed....".$e->getmessage());
	} -->

<?php
	/**
	 * Singleton class
	 */
	class dbcon 
	{
		public static $con;
	    /**
	     * private constructor only for singleton obj
	     */
	    private function __construct()
	    {

	    }

	    public function getInstance()
	    {
	    	if (self::$con == null) {
				try{
				//self::$con =  new PDO("mysql:host=www.db4free.net;dbname=aaabbcc","vikrant5555","1234567890");
				//https://db4free.net/phpMyAdmin/db_structure.php?db=aaabbcc	
				//	self::$con =  new PDO("mysql:host=192.168.0.103;dbname=tpcell","Manav","Man011299");
					self::$con =  new PDO("mysql:host=localhost;dbname=ntpcell","root","");
				}catch(PDOException $e){
					die("connection Failed....".$e->getmessage());
				}	        	
	        }
	        return self::$con;	
	    }
	}

	$con = dbcon::getInstance();
?>
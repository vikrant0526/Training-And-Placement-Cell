
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
					self::$con =  new PDO("mysql:host=tpcell.online:3306;dbname=tpcellon_tpcell","tpcellon_tpcell","Man011299");
					// self::$con =  new PDO("mysql:host=localhost;dbname=tpcell","root","");
					// self::$con =  new PDO("mysql:host=db4free.net;dbname=aaabbcc","vikrant5555","1234567890");
				}catch(PDOException $e){
					die("connection Failed....".$e->getmessage());
				}	        	
	        }
	        return self::$con;	
	    }
	}

	$con = dbcon::getInstance();
?>
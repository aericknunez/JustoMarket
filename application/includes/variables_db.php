<?php
date_default_timezone_set('America/El_Salvador');

if(Helpers::ServerDomain() == TRUE){

define("HOST", "db5002171255.hosting-data.io"); 			//35.225.56.157 The host you want to connect to. 
define("USER", "dbu60825"); 			// The database username. 
define("PASSWORD", "Caca007125-"); 	// The database password.
define("DATABASE", "dbs1756640");
define("BASE_URL", "http://justomarket.com/");  
define("HOST_URL", "http://");

define("URL_SERVER", "https://sistema.hibridosv.com"); 
define("TD_SERVER", "10");    
} else {

define("HOST", "localhost"); 			//35.225.56.157 The host you want to connect to. 
define("USER", "root"); 			// The database username. 
define("PASSWORD", "erick"); 	// The database password. 
define("DATABASE", "justomarket"); 
define("BASE_URL", "http://localhost/justomarket/");
define("HOST_URL", "http://"); 

define("URL_SERVER", "http://localhost/cozto/"); 
define("TD_SERVER", "10");  
}

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");
define("SECURE", FALSE);    // For development purposes only!!!!

define("BASEPATH", "http://justomarket.com/");  
?>
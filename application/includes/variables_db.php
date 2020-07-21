<?php
date_default_timezone_set('America/El_Salvador');

if(Helpers::ServerDomain() == TRUE){

define("HOST", "localhost"); 			//35.225.56.157 The host you want to connect to. 
define("USER", "superpol_erick"); 			// The database username. 
define("PASSWORD", "caca007125-"); 	// The database password.
define("DATABASE", "superpol_justomarket");
define("BASE_URL", "https://justomarket.com/");  
define("HOST_URL", "https://");

define("URL_SERVER", "https://pizto.com/login/"); 
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

define("BASEPATH", "https://justomarket.com/");  
?>
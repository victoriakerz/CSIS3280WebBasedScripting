<?php

// DO NOT MODIFY THIS FILE ... unless you want to get a ZERO
// Define configuration  
define("DB_HOST", "localhost");  
define("DB_USER", "root");  
define("DB_PASS", "");  
define("DB_NAME", "StudentFeedback");  

// definition for log file
define('LOGFILE','log/error_log.txt');
ini_set("log_errors", TRUE);  
ini_set('error_log', LOGFILE); 
?>
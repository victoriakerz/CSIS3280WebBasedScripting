<?php

// for file operation
define('REPOSITORY','./data/');
define('FILEDATA','orders.txt');
define('FILENAME',REPOSITORY.FILEDATA);

// definition for log file
define('LOGFILE','log/error_log.txt');
  
// setting error logging to be active 
ini_set("log_errors", TRUE);  
  
// setting the logging file in php.ini 
ini_set('error_log', LOGFILE); 
  
// logging the error 
//error_log($error_message); 

?>
<?php

// define the DATAFILE
define('REPOSITORY', './Other directories/data/');
define('FILEDATA', 'feedback_AKe92572.txt');
define('FILENAME', REPOSITORY.FILEDATA);

// define the LOGFILE
define('LOGFILE', 'log/error_log.txt');

// set the ini file to log the error to the LOGFILE
ini_set("log_errors", TRUE);

ini_set('error_log', LOGFILE);
?>
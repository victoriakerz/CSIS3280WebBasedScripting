<?php

/**
 * Student Name:            Anna Victoria Kerz
 * Student ID:              300292572
 * Assignment/File Name:    Lab04
 *
 * Description:
 *
 * This portion describes the File/Assignment
 *
 * References:
 *
 * Please make sure you provide the appropriate url references
 * or any comment for example if you referenced some help you
 * received from your instructor or some demo code provided in
 * class.
 *
 *
 **/

// for file operation
define('REPOSITORY', './data/');
define('FILEDATA', 'feedback_AKe92572.txt');
define('FILENAME', REPOSITORY.FILEDATA);

// for log file
define('LOGFILE', 'log/error_log.txt');

// make sure logging error is activated
ini_set("log_errors", TRUE);

// setting the logfile to be used in out app
ini_set('error_log', LOGFILE);

?>
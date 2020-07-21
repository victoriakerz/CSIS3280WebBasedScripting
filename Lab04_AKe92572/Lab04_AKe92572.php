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

require_once("inc/config.inc.php");
require_once('inc/html.inc.php');
require_once('inc/validate.inc.php');
require_once('inc/utility.inc.php');

//Check if the form was posted, validate the input
if (!empty($_POST)) {
    //Blank name and get the errors by trying to process
    $fileName = '';
    $errors = processUpload($fileName);
}

//Show the header
getHeader("File Form");

if(empty($_POST)){
    //If the form hasn't been posted yet, show the form option
    displayFileForm();
}
else{
    //If the errors array is not empty
    if(!empty($errors)){
        // Uses the default file, we get the path from the config
        $fileName = FILENAME;
        // Show the errors
        displayErrors($errors);
    }
    // Display the table with no errors
    displayTable($fileName);
}
getFooter();
?>
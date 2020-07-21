<?php

/**
 * Student Name:            Anna Victoria Kerz
 * Student ID:              300292572
 * Assignment/File Name:    Lab05
 *
 * Description:
 *
 * This portion describes the File/Assignment
 *
 * References:
 * I Used the demo code from Lecture 5 as a guide
 *
 **/

// Require the config and utility classes
require_once("inc/config.inc.php");
require_once("inc/Validation.class.php");
require_once("inc/Feedback.class.php");
require_once("inc/FileUtility.class.php");
require_once("inc/Page.class.php");

// Require Feedback subclasses
require_once("inc/Entities/Accounting.class.php");
require_once("inc/Entities/Business.class.php");
require_once("inc/Entities/Computing.class.php");
require_once("inc/Entities/Management.class.php");

// call the static page header method
Page::header("Feedback Data and Form","Anna Victoria Kerz");

// if there's posted data call the file utility write method
if(isset($_POST)){
    $errors = FileUtility::write();
}

// Declare a new feedback object
$feedback = new Feedback();

// read the file
$fileContent = FileUtility::read(FILENAME);

// parse it to the feedback object
$feedback->parseData($fileContent);

// display the main article
Page::displayMainArticle($errors,$feedback);

// display the entry form
Page::addEntryForm();

// display the footer
Page::footer();
?>
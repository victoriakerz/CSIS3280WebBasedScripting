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

class Feedback {

//Build an array for each class type for all the classes.
    public $feedbackRecords = array();

    // the dept information will be used to categorize the class
    // into different subclasses

    //This function returns a flat array of objects
    function parseData($fileContents)
    {
        $lines = explode("\n", $fileContents);
        for ($x = 1, $xMax = count($lines); $x < $xMax; $x++) {
            $columns = explode(",", $lines[$x]);

            // $item will hold an object. it is initialized to null
            $feedback = null;

            //Parse the order based on the different order type
            switch ($columns[0]) {
                case "ACCT":
                    $feedback = new Accounting();
                    break;

                case "CSIS":
                    $feedback = new Computing();
                    break;

                case "BUSN":
                    $feedback = new Business();
                    break;

                case "MGMT":
                    $feedback = new Management();
                    break;

                default:
                    // Using the CSIS department as the default, which should not be needed anyways
                    // since we are validating entries before reading them into the website.
                    $feedback = new Computing();
                    break;

            }
            $feedback->name = trim($columns[1]);
            $feedback->email = trim($columns[2]);
            $feedback->terms = trim($columns[3]);
            $feedback->dob = trim($columns[4]);
            $feedback->objfeedback = trim($columns[5]);

            //Add the item to the order array
            $this->feedbackRecords[] = $feedback;
        }
    }
 }

 ?>
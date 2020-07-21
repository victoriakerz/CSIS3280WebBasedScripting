<?php

/**
 * Student Name:            Anna Victoria Kerz
 * Student ID:              300292572
 * Assignment/File Name:    Lab03
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


// This function validate the submitted data and return the list of error messages
function validateForm(){
    //initialize errors_array
    $errors = array();

    //initialize values array to store the dataS
    $values = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        foreach ($_POST as $key => $value) {
            $values[$key] = trim(stripslashes($value)); // basic input filter
        }
        //Validate the name
        if (empty($values['name'])) {
            $errors['name'] = 'Please enter a valid name.';
        }
        //Validate the email address
        if (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $values['email'])) {
            $errors['email'] = 'Please enter a valid email address.';
        }
        //Validate the term
        if ($values['terms'] < 1 || $values['terms'] > 10) {
            $errors['terms'] = 'Please enter a valid term between 1 until 10.';
        }
        //Check to see the user entered a valid dob
        $date = DateTime::createFromFormat('Y-m-d', $values['dob']);
        if($date){
            $explodedDate = explode("-", $values['dob']);
            list($y, $m, $d) = $explodedDate[0];
            $valid = checkdate($m, $d, $y) ? 'Valid' : 'Invalid';

            //Check if the user is over 15 years old
            if(isset($_POST['dob']) && $valid && time() < strtotime('+15 years', strtotime($values['dob']))) {
                $errors['age'] = 'Please enter a valid date of birth. You should be at least 15 years old to fill this form.';
            }
        }
        else {
            $errors['dob'] = 'Please enter a valid date of birth.';
        }
        //Ensure the drop down was selected
        if ($values['department'] === 'select') {
            $errors['department'] = 'Please select a major!';
        }
        //Check the message
        if (empty($values['feedback'])) {
            $errors['feedback'] = 'Please enter a Message.';
        }
        //Return the errors
        return $errors;
    }
}
?>
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

class Validation {
    /***
     * @return array of errors
     * @author Anna Victoria Kerz
     * Validates all entries from the form, trying to parse data, making sure
     * all entries are in the allowed parameters. Any error that occurs is added
     * to the array and displayed by the displayNotification method in the Page class.
     */
    static function validate(){
        $errors = array();
        $values = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($_POST as $key => $value) {
                $values[$key] = trim(stripslashes($value)); // basic input filter
            }
            if (empty($values['nameInput'])) {
                $errors['nameInput'] = 'Please enter a valid name.';
            }

            if (!preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $values['emailInput'])) {
                $errors['emailInput'] = 'Please enter a valid email address.';
            }

            if ($values['termsInput'] < 1 || $values['termsInput'] > 10) {
                $errors['termsInput'] = 'Please enter a valid term between 1 until 10.';
            }

            $date = DateTime::createFromFormat('Y-m-d', $values['dateInput']);
            if($date){
                $explodedDate = explode("-", $values['dateInput']);
                list($y, $m, $d) = $explodedDate[0];
                $valid = checkdate($m, $d, $y) ? 'Valid' : 'Invalid';

                if(isset($_POST['dateInput']) && $valid && time() < strtotime('+15 years', strtotime($values['dateInput']))) {
                    $errors['age'] = 'Please enter a valid date of birth. You should be at least 15 years old to fill this form.';
                }
            }
            else {
                $errors['dateInput'] = 'Please enter a valid date of birth.';
            }

            if ($values['deptInput'] === 'Select...') {
                $errors['deptInput'] = 'Please select a major!';
            }

            if (empty($values['feedbackInput'])) {
                $errors['feedbackInput'] = 'Please enter a Message.';
            }
            return $errors;
        }
    }
}
?>
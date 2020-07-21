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
?>
<?php
/****             START YOUR CODE BELOW           ****/
require_once("inc/config.inc.php");
require_once('inc/html.inc.php');
require_once('inc/validate.inc.php');
require_once('inc/utility.inc.php');

//Show the header
getHeader('Feedback Form');

$errors = validateForm();

if (!empty($_POST) && empty($errors)){
    displayThankyou();
    displayData();
    //writeData('data/feedback_AKe92572.txt');
}
else if (!empty($_POST) && !empty($errors)){
//Show the form and display the errors
    displayErrors($errors);
    displayHTMLForm();
}
else{
    //Show the form
    displayHTMLForm();
}
//Show the footer
getFooter();

?>


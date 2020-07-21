<?php
// require the config
require_once("inc/config.inc.php");
// require all the entities
require_once("inc/Entity/Department.class.php");
require_once("inc/Entity/Feedback.class.php");
require_once("inc/Entity/Page.class.php");
// require all the utilities: PDO and DAO(s)
require_once("inc/Utility/DepartmentDAO.class.php");
require_once("inc/Utility/FeedbackDAO.class.php");
require_once("inc/Utility/PDOService.class.php");
//Initialize the DAO(s)
DepartmentDAO::initialize("Department");
FeedbackDAO::initialize("Feedback");
//If there was post data from an edit form then process it
if (!empty($_POST)) {
    // if it is an edit (remember the hidden input)
    if (!empty($_POST['action'] == 'edit')) {
        //Assemble the Reservation to update
        $feedbackToUpdate = FeedbackDAO::getFeedback($_POST["feedbackid"]);
        //Send the Reservation to the DAO to be updated
        FeedbackDAO::updateFeedback($feedbackToUpdate);

        // it is not an edit... it means create a new record
        $newFeedback = new Feedback();
        //Assemble the Reservation to Insert/Create
        $newFeedback->setFullName($_POST['fullName']);
        $newFeedback->setEmail($_POST['email']);
        $newFeedback->setDOB($_POST['dob']);
        $newFeedback->setNumberOfTerms($_POST['terms']);
        $newFeedback->setDeptID($_POST['deptID']);
        //Send the Reservation to the DAO for creation
        FeedbackDAO::createFeedback($newFeedback);
    }
}
//If there was a delete that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "delete") {
    //Use the DAO to delete the corresponding Feedback
    FeedbackDAO::deleteFeedback($_GET['id']);
}
// Display the header (remeber to set the title/heading)
// Call the HTML header
Page::header();
// List all reservations.
// Note: You need to use the results from the corresponding DAO that gives you the reservation list
$allFeedback = FeedbackDAO::getFeedbackList();
Page::listFeedbacks($allFeedback);

//If there was a edit that came in via GET
if (isset($_GET["action"]) && $_GET["action"] == "edit") {
    // Use the DAO to pull that specific reservation
    // Hint: notice the url link for delete.... you should have something similar with edit
    // And you can access it through $_GET
    $feedback = FeedbackDAO::getFeedback($_GET['id']);
    // Render the  Edit Section form with the reservation to edit.
    // Remember to use the correct DAO to get the facility list
    $department = DepartmentDAO::getDepartment();
    Page::editFeedbackForm($feedback, $department);
} else {
    // Otherwise, it is a create reservation form
    $department = DepartmentDAO::getDepartment();
    Page::createFeedbackForm($department);
}
Page::footer();
// Finally I need to call the last function from the HTML

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

// Write the data from the form to the default file
function writeData($fileName){
    $errors = array();
    $header='';
    if(!file_exists($fileName)){
        //Create a header if the file doesn't already exist
        $header = "Name, Email, Terms, DOB, Department, Feedback";
    }

    // Write the data we got from the form
    $input = $header . "\n". $_POST['name'] . ", ";
    $input .= $_POST['email'] . ", ";
    $input .= $_POST['terms'] . ", ";
    $input .= $_POST['dob']. ", ";
    $input .= $_POST['department']. ", ";
    $input .= $_POST['feedback'];

    try{
        // Create a handler, lock the file and append the new entry to the file
        $handler = fopen($fileName, "a");
        flock($handler, LOCK_EX);
        if(!fwrite($handler, $input, strlen($input))){
            throw new Exception("Failed to move");
        }
        flock($handler, LOCK_UN);
    }
    catch(Exception $exception){
        // If an exception is caught, it both adds it to the error list to display to
        // the user and also logs it for easier troubleshooting
        $error = 'There was a problem with the upload. Error code 4.';
        array_push($error, $error);
        error_log($exception->getMessage());
    }
    finally{
        // Close handler so the file can be reused bu other processes
        fclose($handler);
    }

    return $errors;
}

// Process the file upload and store errors in an array to be returned
function processUpload(&$fileName){
    $errors = array();
    // If there are no problems while trying to upload the file
    if ($_FILES['fileToUpload']['error'] == UPLOAD_ERR_OK) {

        if (is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
            // Check for text/plain format. Not that this does not recognize if the
            // delimiters are or aren't commas, it just checks for the type, so
            // errors can still occur when trying to explode the output, showing all
            // the output in a single column for example.
            // Record the error
            if (($_FILES['fileToUpload']['type'] != "text/plain")){
                $error = "The data file must be uploaded in comma separated text format.";
                array_push($errors, $error);
                error_log($error);
            } else {
                //If the file is valid, grab the original name and re-save it with the
                // new timestamp
                $unixStamp = date('m-d-Y_H-i-s');
                $fileName = REPOSITORY . $unixStamp . '_' . $_FILES['fileToUpload']['name'];
                $result = move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $fileName);
                if ($result != 1){
                    // Error when trying to convert the original file into the new one
                    // with the timestamp and required naming conventions.
                    $error = "There was a problem uploading the file.";
                    array_push($errors, $error);
                    error_log($error);
                }
            }
        }
    }
    else {
        // Error to show if the user only presses the submit button and wants to see data
        $error = "No files were uploaded";
        error_log($error);
        array_push($errors, $error);
    }

    if(!empty($errors)){
        // Default message gets added when we have any type of errors
        array_push($errors, "We will use the data we have in the server");
    }
    return $errors;
}

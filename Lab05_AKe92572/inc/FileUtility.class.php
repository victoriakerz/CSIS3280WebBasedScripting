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

class FileUtility {
    static $notifications = array();
    /***
     * @return false|string
     * Reads data from the feedback file. Returns errors for
     * failure upon opening the file or any other exception during the
     * process of reading the contents. Returns the string with the file
     * contents if successful, otherwise returns false.
     * Output is not generated, only gathered and displayed in
     * Page::displayNotification()
     */
    static function read()    {
        try {
            $fh = fopen(FILENAME,'r');
            $contents = fread($fh,filesize(FILENAME));
            fclose($fh);
            if (!$fh)    {
                self::$notifications = array("Couldn't open file.");
            }
        } catch (Exception $fe)  {
            self::$notifications = array($fe->getMessage());
        }
        return $contents;
    }

    /***
     * @return array
     * Creates an object of the Validation class.
     * Validates the data, and gets an error array in return.
     * Errors are displayed by Page::displayNotification()
     */
    static function write(){
        $validator = new Validation();
        $notifications = $validator->validate();
        $input = '';
        if(empty($notifications)){
            if (!empty($_POST['deptInput'])) $input = "\n" . $_POST['deptInput'] . ", ";
            if (!empty($_POST['nameInput'])) $input .= $_POST['nameInput'] . ", ";
            if (!empty($_POST['emailInput'])) $input .= $_POST['emailInput'] . ", ";
            if (!empty($_POST['termsInput'])) $input .= $_POST['termsInput'] . ", ";
            if (!empty($_POST['dateInput'])) $input .= $_POST['dateInput']. ", ";
            if (!empty($_POST['feedbackInput'])) $input .= $_POST['feedbackInput'];

            try{
                $handler = fopen(FILENAME, 'a');
                flock($handler, LOCK_EX);
                if(!fwrite($handler, $input, strlen($input))){
                    throw new Exception("");
                }
                flock($handler, LOCK_UN);
            }
            catch(Exception $exception){
                self::$notifications[] = 'There was a problem with the upload.';
                error_log($exception->getMessage());
            }
            finally{
                fclose($handler);
            }
        }
        return $notifications;
    }    
}

?>
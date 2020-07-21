<?php

require_once("inc/config.inc.php");
require_once("inc/lec5_html.inc.php");
require_once("inc/lec5_utility.inc.php");
require_once("inc/lec5_validation.inc.php");

//Check if the form was posted, validate the input
if (!empty($_POST)) {
    $fileName = '';
    $errors = uploadData($fileName);    
}

//Show the header
displayHeader("File Form");

if(empty($_POST)){
        
    showFileUploadForm();
}
else{
    
    
    if(!empty($errors)){
        // if file was submitted and error
        // we will use the default filename
        $fileName = FILENAME;
        displayError($errors);
        //echo "submit with error filename $fileName\n";
    }
    // otherwise, we have the fileName ready

    // then, display the table
    showTable($fileName);
}

displayFooter();

?>
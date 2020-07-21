<?php

/*
Change from the previous version
- created config.inc.php where we store definition for the file and error log
- addData() does not need $filename, in addition it returns the error message
- forms inputs were re-organized and an additional input is added
- html.inc.php is modified to accommodate the additional input
- validation is modified to accommodate the change
- add try catch block in fopen and fwrite. Write an error log when Exception is thrown
- fileUpload() only accept txt file now
*/

require_once("inc/config.inc.php");
require_once("inc/lec5_validation.inc.php");
require_once("inc/lec5_html.inc.php");
require_once("inc/lec5_utility.inc.php");


displayHeader("Order Form");


if(!empty($_POST) && validateForm()){
    // save the data to the file 
    // filename is now defined as constant        
    $error = addData(); 
    if(empty($error)) 
        displayThankyou();    
    else
        displayError($error);
}
elseif(!empty($_POST) && !validateForm()){ 
    displayError();        
}
else{ 
    displayOrderForm();
}

displayFooter();
?>



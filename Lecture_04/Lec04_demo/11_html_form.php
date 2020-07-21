<?php

require_once("inc/validation.inc.php");
require_once("inc/html.inc.php");


displayHeader("Order Form");


if(!empty($_POST) && validateForm()){
    // save the data to the file 
    displayThankyou();
    
    
}
elseif(!empty($_POST) && !validateForm()){ 
    displayError();        
}
else{ 
    displayOrderForm();
}

displayFooter();
?>



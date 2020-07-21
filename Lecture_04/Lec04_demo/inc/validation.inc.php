<?php
 
// simple validation
function validateForm()    {
    
    $valid = true;
    $filteredTire = filter_input(INPUT_POST,'tires', FILTER_VALIDATE_INT);
    $filterOption = array("options" =>array("min_range"=>1, "max_range"=>10));
    $filteredOil = filter_input(INPUT_POST,'oil',FILTER_VALIDATE_INT,$filterOption);

    if ((strlen($_POST["name"]) == 0) || !$filteredTire || !$filteredOil) {    
        $valid = false;
    }    
    
    return $valid;

}
<?php

require_once('inc/Shape.class.php');
require_once('inc/Rectangle.class.php');
require_once('inc/Triangle.class.php');
require_once('inc/Utility.class.php');

$shapeArray = array();

// option are a: add shape, c: calculate cost, e: exit

$option = '';

Utility::header();

while($option!='e'){
    $option = Utility::getOption();
    
    switch($option){
        case 'a':
            // add shape
            array_push($shapeArray,Utility::getShape());
            //var_dump($shape);
            break;
        
        case 'p':
            Utility::printShape($shapeArray);
            break;
        
        case 'c':
            // calculate all area
            Utility::calculateArea($shapeArray);
            break;
    }
}

Utility::footer();


?>
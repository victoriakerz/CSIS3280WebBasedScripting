<?php

class Rectangle extends Shape{
    private $type = "Rectangle";
    
    function setType(){
        $this->type = "Rectangle";
    }

    function getType(){
        return $this->type;
    }
}


?>
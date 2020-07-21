<?php

class Triangle extends Shape{
    private $type = "Triangle";
    
    function setType(){
        $this->type = "Triangle";
    }

    function getType(){
        return $this->type;
    }
    
    // override the parent method
    function getArea(){
        // will give a fatal error if parent is not protected
        return 0.5 * $this->height * $this->width;        
    }
}


?>
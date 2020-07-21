<?php

class Shape{
    
    // start with private to show the errors
    protected $height;
    protected $width;

    function setHeight($height){
        $this->height = $height;
    }

    function setWidth($width){
        $this->width = $width;
    }

    function getArea(){
        return $this->height * $this->width;
    }
    
    function getHeight(){
        return $this->height;
    }
    function getWidth(){
        return $this->width;
    }

}


?>
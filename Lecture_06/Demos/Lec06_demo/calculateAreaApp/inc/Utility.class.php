<?php

class Utility{

    static function header(){
        echo "\n--------------------------------------------";
        echo "\n     Object oriendted area calculation      ";
        echo "\n--------------------------------------------";
    }

    static function footer(){
        echo "\n--------------------------------------------";
        echo "\n               Thank you                    ";
        echo "\n--------------------------------------------";
    }

    static function getOption(){
        echo "\nPlease enter your command a (add), p (print), c (calculate area): ";
        return stream_get_line(STDIN, 1024,PHP_EOL);    
    }

    static function getShape(){
        echo "\nPlease enter the shape type (rectangle or triangle): ";
        $type = stream_get_line(STDIN, 1024,PHP_EOL);
        while(!($type == "rectangle" || $type == "triangle")){
            echo "\nPlease enter the shape type (rectangle or triangle): ";
            $type = stream_get_line(STDIN, 1024,PHP_EOL);
        }
        
        if($type == "rectangle")
            $shape = new Rectangle();
        else
            $shape = new Triangle();
        
        echo "\nPlease enter the height > 0: ";
        $height = stream_get_line(STDIN, 1024,PHP_EOL);
        while((int)$height<1){
            echo "\nPlease enter the height > 0: ";
            $height = stream_get_line(STDIN, 1024,PHP_EOL);
        }
        $shape->setHeight($height);

        echo "\nPlease enter the width > 0: ";
        $width = stream_get_line(STDIN, 1024,PHP_EOL);
        while((int)$width<1){
            echo "\nPlease enter the width > 0: ";
            $width = stream_get_line(STDIN, 1024,PHP_EOL);
        }
        $shape->setWidth($width);
        //$shape->getArea();

        return $shape;    
    }

    static function printShape($shapeArray){

        if(empty($shapeArray)){
            echo "\nPlease add a new shape";
        }
        else{
            echo "\nThe shapes are:";
            echo "\nType\t\tHeight\tWidth";
            foreach($shapeArray as $shape){
                printf("\n%s\t%d\t%d",$shape->getType(),$shape->getHeight(),$shape->getWidth());
            }
            echo "\n";
        }
    }

    static function calculateArea($shapeArray){
        if(empty($shapeArray)){
            echo "\nPlease add a new shape";
        }
        else{
            echo "\nThe total area is: ";
            $totalArea = 0;
            for($i=0; $i<count($shapeArray);$i++){
                $area = $shapeArray[$i]->getArea();                
                $totalArea += $area;

                if(count($shapeArray)>1){
                    printf("%.2f ",$area);

                    if($i<count($shapeArray)-1) echo "+ ";
                    else echo "= ";
                }
            }
            
            printf("%.2f\n",$totalArea);

            
        }
    }

}

?>
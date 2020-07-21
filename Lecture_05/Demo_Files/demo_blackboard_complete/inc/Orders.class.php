<?php
 
 class Orders {
    
    //Build an array for each class type for all the classes.
    public $orders = array();

    //This function returns a flat array of objects
    function parseData($fileContents)   {

        //Lines
        $lines = explode("\n", $fileContents);

        //Walk the lines only from the second line
        //Rememver the first line is the data header
        for ($x = 1, $xMax = count($lines); $x < $xMax; $x++)    {
            //Pull the columns
            $columns = explode(",", $lines[$x]);
            
            // $item will hold an object. it is initialized to null
            $item =  null; 

            
            //Parse the order based on the different order type
            switch ($columns[0])    {                
                case "regular":
                    $item = new Regular();                    
                    break;

                case "special":
                    $item = new Special();
                    break;

                default:
                    //$item = new Computing();                   
                    // I don't know which class it belongs to
                    break;

            }
            $item->name = trim($columns[1]);
            $item->tires = trim($columns[2]);
            $item->oils = trim($columns[3]);            

            //Add the item to the order array
            $this->orders[] = $item;

        }
        
        // You may want to sort the orders array...

    }

    

 }

 ?>
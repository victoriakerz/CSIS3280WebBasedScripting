<?php

class FileUtility {

    static $notifications = array();
    static $fileCounter = 0;
    

    static function read($fileName)    {

        try {
            $fh = fopen($fileName,'r');
            $contents = fread($fh,filesize($fileName));
            fclose($fh);

            if (!$fh)    {
                throw new Exception("Couldn't open file $fe");
            }
        } catch (Exception $fe)  {
            //Page::notify(array($fe->getMessage()));
            self::$notifications = array($fe->getMessage());
            
        }

        
        return $contents;
    }

    static function upload(){
        
        $fileName = '';

        //Check if a file was uploaded
        if (empty($_FILES)) {
            self::$notifications[] = "Error: Please select a file to upload.";
        }
        else{
            if (is_uploaded_file($_FILES['dataFile']['tmp_name'])) {
                // We skip the file format checking
                
                // Move uploaded file to final destination.                
                
                $result = move_uploaded_file($_FILES['dataFile']['tmp_name'],
                REPOSITORY . self::$fileCounter . '_' . $_FILES['dataFile']['name']);
                if ($result == 1){ 
                    self::$notifications[] = "Success: File was successfully uploaded.";                    
                    $fileName = REPOSITORY . self::$fileCounter . '_' . $_FILES['dataFile']['name'];
                    self::$fileCounter++;
                }
                else 
                    self::$notifications[] = "Error: There was a problem uploading the file.";
                
            }
        }

        
        return $fileName;
    
    }

    
}

?>
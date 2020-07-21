<?php

/* changelog from lecture 5
    - checking empty($_FILES) will not work --> changed to empty($_FILES['dataFile']['name'])
    - successful upload notification message was changed to include the filename
*/

class FileUtility {

    static $notifications = array();
    static $fileCounter = 0;
    

    static function read($fileName)    {

        try {
            $fh = fopen($fileName,'r');
            $contents = fread($fh,filesize($fileName));
            fclose($fh);

            if (!$fh)    {
                throw new Exception("Couldn't open file $fh");
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
        if (empty($_FILES['dataFile']['name'])) {
            self::$notifications[] = "Error: You did not select any file to upload";
        }
        else{
            if (is_uploaded_file($_FILES['dataFile']['tmp_name'])) {
                // We skip the file format checking
                
                // Move uploaded file to final destination.                
                
                $result = move_uploaded_file($_FILES['dataFile']['tmp_name'],
                REPOSITORY . self::$fileCounter . '_' . $_FILES['dataFile']['name']);
                if ($result == 1){ 
                    $fileName = REPOSITORY . self::$fileCounter . '_' . $_FILES['dataFile']['name'];
                    self::$notifications[] = "Success: File ".$fileName." was successfully uploaded.";                                        
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
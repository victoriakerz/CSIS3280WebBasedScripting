<?php
/*
Changelog
addData()
- Add try catch block
- Move the "\n" from the end of the string to the beginning of the string
- To avoid problems when we loop it in the object or table
- Add error_log when we write data

uploadData()
- Remove checking the other file types
- Add error_log
*/
function addData(){
    
    
    $error ='';
    $header='';
    if(!file_exists(FILENAME)){
        $header = "Order Type, Name, Tires, Oils";
    }

    $input = $header . "\n". $_POST["orderType"] . ", "; 
    $input .= $_POST["name"] . ", ";
    $input .= $_POST["tires"] . ", ";
    $input .= $_POST["oil"];
    try{
        $fh = fopen(FILENAME, "a");
        flock($fh, LOCK_EX);
        fwrite($fh, $input, strlen($input));
        flock($fh, LOCK_UN);
        throw new Exception("Fail to open or write the data");        
    }
    catch(Exception $e){
        $error = 'Caught an exception: ' . $e->getMessage() . "\n";
        echo $error;
        // log the 'error'
        error_log($e->getMessage());
    }
    finally{
        fclose($fh);
    }

    return $error;

}

// add errors string

function uploadData(&$fileName){   
    $errors = '';
     
    if ($_FILES['dataFile']['error'] == UPLOAD_ERR_OK) {
        if (is_uploaded_file($_FILES['dataFile']['tmp_name'])) {
            
            if (($_FILES['dataFile']['type'] != "text/plain")){
                $errors = "The data file must be uploaded in comma separated text format.";
                error_log($errors);
            } else {
                // Move uploaded file to final destination.
                // generate random number between 1000 to 2000
                $id = rand(1000, 2000);
                $fileName = FILEREPOSITORY . $id . '_' . $_FILES['dataFile']['name'];
                $result = move_uploaded_file($_FILES['dataFile']['tmp_name'], $fileName);
                if ($result != 1){ 
                    $errors = "There was a problem uploading the file.";
                    error_log($errors);
                }
            }
        }
    }
    else {
        $errors = "No file were uploaded";
        error_log($errors);
    }
    
    if(!empty($errors))
        $errors .= "\n<br>We will use the data we have in the server";

    return $errors;
}
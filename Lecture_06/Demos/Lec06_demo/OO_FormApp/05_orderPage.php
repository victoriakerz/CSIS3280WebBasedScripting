<?php
/* changelog from lecture 5
    - FileUtility::$notifications is passed as a parameter to Page::article()
*/

//Require utility classes and config
require_once("inc/config.inc.php");
require_once("inc/Page.class.php");
require_once("inc/FileUtility.class.php");
require_once("inc/Orders.class.php");

//Require Feedback subclasses
require_once("inc/subclass/Special.class.php");
require_once("inc/subclass/Regular.class.php");


Page::header("Order Form","Bambang");


//Declare a new feedback
$orders = new Orders();

$read = true;

if(!empty($_POST)){
    if(!isset($_POST['orderType'])){
        // upload file is performed        
        $fileName = FileUtility::upload();
        if(!empty($fileName)){
            $fileContents = FileUtility::read($fileName);            
            $read = false;
        }
    }    
    
}

if($read){
    $fileContents = FileUtility::read(FILENAME);
}
//read the file

$orders->parseData($fileContents);

Page::article(FileUtility::$notifications,$orders);

Page::form();

Page::footer();

?>
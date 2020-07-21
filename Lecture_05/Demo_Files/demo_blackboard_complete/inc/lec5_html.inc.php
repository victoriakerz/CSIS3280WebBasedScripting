<?php

function displayHeader($title){
?>
<!-- Start HTML -->
<!DOCTYPE html>
    <html>

    <head>

        <!-- Basic Page Needs ––––––––––––– -->
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>

        <!-- CSS ––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/skeleton.css">
        <link rel="stylesheet" href="css/additional.css">

    </head>

    <body>
        <!-- Primary Page Layout ––––––––––––––––––––– -->
        <section class="container row">
        <h2><?php echo $title;?></h2>
<?php
}

function displayFooter(){
?>
<!-- Close the html -->
</section>
    </body>
</html>

<?php
}


function displayOrderForm(){
?>
<form method="post" action="">     
    <fieldset id="order"> 
        <legend>Orders</legend>
        <div class="row">          
          <label class="width50" for="type">Order Type</label>
            <select class="width50" name="orderType">
              <option value="Select...">Please select one option</option>
              <option value="regular">Regular</option>
              <option value="special">Special</option>              
            </select>
        </div>
        <div class="row">          
          <label class="width50" for="name">Your Name</label>
          <input class="width50" type="text" name="name">          
        </div>
        <div class="row">             
            <label class="width50" for="tires">Tires</label>
            <input class="width50" type="text" name="tires">
        </div>
        <div class="row">             
            <label class="width50" for="oil">Oil (Max 10)</label>
            <input class="width50" type="text" name="oil">
        </div>
    

    </fieldset>
    <input class="button-primary" type="submit" value="Submit Order">
    </form>

<?php
}


function displayThankyou(){
?>
    <div class="row highlight">
        <h4>Thank you!</h4>
        <p>
            We have received your order, thank you!
            <br>
            Your data has been saved in our file.        
        </p>

    </div>
<?php
}


function displayError($error=''){
?>
<div class="row highlight">        
        <p>Your data contains error, please try again</p>            
        <p><?php echo $error;?></p>
    </div>
<?php
}

function showFileUploadForm()    { 
  
    ?>
  
      <form METHOD="POST" ACTION="" enctype="multipart/form-data">     
          <div class="row">          
            <label form="dataFile">Data file (txt):</label><br>
            <input class="width100" type="file" name="dataFile" value=""><br>          
          </div>
  
          <input  type="submit" name="submit" value="Submit File">
          
          
        </form>
  
  <?php 
  }
  
  function showTable($fileName){
    
    $fh = fopen($fileName, 'r');
    echo "<table class=\"u-full-width\">";
     
      $row = 0;
      $line = array();
      while (list($type, $name, $tires, $oils) = fgetcsv($fh, 1024, ',')) {
        if($row == 0){
          // we are printing the header here
          echo "\n<thead><tr>";
          // it is better to use loop here
          echo "\n\t<th>" . trim($type) ."</th>";
          echo "\n\t<th>" . trim($name) ."</th>";
          echo "\n\t<th>" . trim($tires) ."</th>";
          echo "\n\t<th>" . trim($oils) ."</th>";          
          echo "\n</tr></thead>";
          
        }
        else{
          echo "\n<tbody><tr>";
          echo "\n\t<td>" . trim($type) ."</td>";
          echo "\n\t<td>" . trim($name) ."</td>";
          echo "\n\t<td>" . trim($tires) ."</td>";
          echo "\n\t<td>" . trim($oils) ."</td>";
          echo "\n</tr></tbody>";
        }
  
        $row++;
      }
  
    echo "\n</table>\n";
    fclose($fh);
  }
?>
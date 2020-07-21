<?php

// the displayError() was modified to accept a parameter
// the heading in the display header is also displaying the input param

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
<form METHOD="POST" ACTION="">     
    <div class="row">          
        <label for="name">Your Name</label>
        <input class="width100" type="text" name="name">          
    </div>

    <fieldset id="order"> 
        <legend>Orders</legend>
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
?>
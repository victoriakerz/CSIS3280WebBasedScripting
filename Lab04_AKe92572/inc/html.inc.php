<?php

/**
 * Student Name:            Anna Victoria Kerz
 * Student ID:              300292572
 * Assignment/File Name:    Lab04
 *
 * Description:
 *
 * This portion describes the File/Assignment
 *
 * References:
 *
 * Please make sure you provide the appropriate url references
 * or any comment for example if you referenced some help you
 * received from your instructor or some demo code provided in
 * class.
 *
 *
 **/

/*
  Please see the last hands-on on lecture 3 to see the example of how to use
  the html template
*/

/****             START YOUR CODE BELOW           ****/

// This function display the html header and upper part of the body
// $title is both the html's title and the body's heading
// You must enclose the form within a section element whose classes
// are container and row
?>

<?php
function getHeader($title) { ?>
    <html>
        <head>
            <meta charset="utf-8">
            <?php echo "<title>$title</title>" ?>
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/skeleton.css">
            <link rel="stylesheet" href="css/additional.css">
            <link rel="stylesheet" href="css/other.css">
        </head>
    <body>
        <section class="container row">
            <div class="row">
                <?php echo "<h2>$title</h2>" ?>
            </div>
<?php }

// This function display the bottom part of the html's document
function getFooter()  { ?>
            </section>
        </body>
    </html>
<?php }

// This function display the form. The form should use post method.
// Each form's element is enclosed with a div whose element class is row
// The element class of all form input is width100
function displayHTMLForm()    { ?>
        <section>
    <form action="" method="POST">
        <div class="row">
            <label for="name">Your Name</label>
            <input class="width100" type="text" name="name">
        </div>
        <div class="row">
            <label for="name">Your Email</label>
            <input class="width100" type="text" name="email">
        </div>
        <div class="row">
            <label for="name">How many terms have you been at the Douglas College (Max 10)</label>
            <input class="width100" type="text" name="terms">
        </div>
        <div class="row">
            <label for="name">Your date of birth</label>
            <input class="width100" type="text" name="dob" placeholder="yyyy-mm-dd">
        </div>
        <div class="row">
            <label for="department">Select your department</label>
            <select class="width100" name="department" id="department">
                <option value="select">Please select one option</option>
                <option value="accounting">Accounting</option>
                <option value="business">Business</option>
                <option value="computing">Computing Studies</option>
                <option value="management">Management</option>
            </select>
        </div>
        <div class="row">
            <label for="name">Feedback</label>
            <textarea class="width100" type="text" name="feedback"></textarea>
        </div>
        <div class="row">
            <input class="button-primary" type="submit" value="Submit">
        </div>
    </form>
        </section>
<?php }

// This function display the list of error messages
function displayErrors($errors)  { ?>
    <section>
    <div class="row feedback width100">
        Please fix the following errors: <ul>
            <?php
            foreach ($errors as $error){
                echo "<li>$error</li>";
            }
            ?>
    </ul></div>
    </section>
<?php }

// This function display the thank you message
function displayThankyou()    { ?>
        <section>
        <div class="row feedback">
            <h4>Thank you!</h4>
            <p>We have received your valuable feedback, thank you for taking the time to tell us what you think!</p>
            <p>Your data has been saved in our server.</p>
        </div>
            </section>
<?php }

// This function display the submitted data
function displayData(){ ?>
        <section>
        <div class="row">
            <h4><br>The following are the submitted data</h4>
        </div>
    <?php   $name = $_POST['name'];
            $email = $_POST['email'];
            $terms = $_POST['terms'];
            $dob = $_POST['dob'];
            $department = $_POST['department'];
            $feedback = $_POST['feedback'];
            printf("Your name: <b> %s </b> <br>", $name);
            printf("Your email: <b> %s </b> <br>" , $email);
            printf("Number of terms at Douglas College: <b> %s </b> <br>" , $terms);
            printf("Your birth date: <b> %s </b> <br>" , $dob);
            printf("Your department: <b> %s </b> <br>" , $department);
            printf("Your feedback: <b> %s </b> <br>" , $feedback); ?>
            <b> Good job</b>
                 </section><?php
            writeData(FILENAME);
}

//Display the form where user can upload a file
function displayFileForm()   { ?>
        <section>
    <div class="row">
        <form action="" method="post" enctype="multipart/form-data">
            <p><b>Please select a data file (txt). Just click on submit if you want to see the current data in our server.</b></p>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <p><input type="submit" value="submit file" name="submitfile"></form></p>
        </form>
    </div>
        </section>
<?php }

//Display the data table from a file
//that is either available in the server, or the one uploaded by the user
function displayTable($fileName)    {
    if(file_exists($fileName)){
        ?>
        <section>
        <div class="row">
            <?php
            $allFeedback = file($fileName);
            $rows = count($allFeedback);
            echo "<table class='width100'><br />";
            for ($row = 0; $row < $rows; $row ++) {
                echo "<tr>";
                $feedbackArr = explode(",", $allFeedback[$row]);
                $columns = count($feedbackArr);
                for ($col = 0; $col < $columns; $col ++) {
                    if($row == 0){
                        echo "<th> $feedbackArr[$col] </th>";
                    }
                    else{
                        echo "<td> $feedbackArr[$col] </td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
        </section>
    <?php
    }
}
?>
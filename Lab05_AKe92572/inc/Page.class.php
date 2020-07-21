<?php

/**
 * Student Name:            Anna Victoria Kerz
 * Student ID:              300292572
 * Assignment/File Name:    Lab05
 *
 * Description:
 *
 * This portion describes the File/Assignment
 *
 * References:
 * I Used the demo code from Lecture 5 as a guide
 *
 **/

class Page {
    static $title = '';
    static $author = '';

    /***
     * @param $title
     * @param $author
     * Displays the top part of the page
     */
    static function header($title, $author) { ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
            <meta charset="utf-8">
            <meta name="author" content=" <?php echo $author ?> ">
            <link href="Other directories/css/styles.css" rel="stylesheet">
        </head>
        <body>
        <header>
            <h1> <?php echo $title ?> </h1>
        </header>
        <article>
    <?php
    }

    /***
     * Displays the add entry form
     */
    static function addEntryForm() { ?>
        <section class="form1">
            <h2>Add a new entry</h2>
            <form method="post">
                Name: <input type="text" name="nameInput"><br>
                Email: <input type="email" name="emailInput"><br>
                Number of terms: <input type="text" name="termsInput"><br>
                Date of Birth: <input type="date" name="dateInput"><br>
                Dept:
                <select name="deptInput">
                    <option value="Select...">Please select one option</option>
                    <option value="ACCT">Accounting</option>
                    <option value="BUSN">Business</option>
                    <option value="CSIS">Computing Studies</option>
                    <option value="MGMT">Management</option>
                </select><br>
                Feedback:<br>
                <textarea name="feedbackInput" cols="60" rows="5"></textarea><br>
                <input type="submit" name="submit" value="Add entry">
            </form>
        </section>
        <?php
    }

    /***
     * @param $error
     * Displays the notifications/errors
     */
    static function displayNotification($error) { ?>
    <div class="error" style="display: block;">
        <h2>Notifications</h2>
            <?php
            if(!empty($error)){
                foreach ($error as $err){
                    echo "- $err <br>";
                }
                echo "<br>";
            } ?>
        </div>
    <?php
    }

    /***
     * @param $error
     * @param $data
     * Displays the main article
     */
    static function displayMainArticle($error, $data) { ?>
        <section class="main">
            <?php
            if (!empty($error)) self::displayNotification($error);
            if(!empty($data)){
                echo "<h2>Current Data</h2>\n";
                echo "<table>\n";
                echo "
                <thead><tr>
                    <th>Dept</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Terms</th>
                    <th>DOB</th>
                    <th>Feedback</th>
                </tr></thead>";
                $i=0;

                foreach($data as $feedbackRecords){
                    foreach($feedbackRecords as $feedback){
                        if($i%2==0) echo "<tr class=\"oddRow\">";
                            else echo "<tr class=\"evenRow\">";
                            echo "<td>" . $feedback->dept . "</td>";
                            echo "<td>" . $feedback->name . "</td>";
                            echo "<td>" . $feedback->email . "</td>";
                            echo "<td>" . $feedback->terms . "</td>";
                            echo "<td>" . $feedback->dob . "</td>";
                            echo "<td>" . $feedback->objfeedback . "</td>";
                            $i++;
                        }
                    }
                    echo "</table>\n";
                    }
                ?>
            </section>
        <?php
    }

    /***
     * Displays the bottom of the page
     */
    static function footer() { ?>
        </article>
        </body>
        </html>
        <?php
    }
}
?>
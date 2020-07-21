<?php

class Page {

    //Set the title of your page!
    static $title = "Please change the page title!";
    static $author = "Please change the author name";

    static function header($title, $author)    {
    ?>
    <!-- Start the page 'header' -->

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8">
        <meta name="author" content="Bambang">   
        <link href="css/styles.css" rel="stylesheet"> 
    <head>

        <!-- Basic Page Needs ––––––––––––– -->
        <meta charset="utf-8">
        <meta name="author" content="">
        <title></title>

        <!-- CSS ––––––––––––––––––––––––––––––––––––––– -->
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>Order data and Form</h1>
        </header>
        <article>
    <?php
    }

    static function footer()    {
    ?>
        <!-- Start the page's footer -->            
        </article>
    </body>
    </html>
    <?php }
    static function form()    {
    ?>
    <!-- Start the page's upload form -->
    <section class="form1">
            <h2>Load a file</h2>
            <form method="post" enctype="multipart/form-data">
                You can also load a data file (txt). <br>
                <input type="file" name="dataFile" value=""><br>
                <input  type="submit" name="submit" value="Load a file">
              </form>
        </section>
    <?php
    }
    static function displayError($error)    {
    ?>
        <div class="error" style="display: block;">
            <h2>Notification</h2>
                <?php
                    echo $error;
                ?>
            </div>
        <?php
    }

static function article($error, $data){
?>
    <!-- Start the page's show data form -->
    <section class="main">
<?php
    if(!empty($error)){
        self::displayError($error);
    }
    if(!empty($data)){
        echo "<h2>Current Data</h2>\n";
        echo "<table>\n";
        echo "
                    <thead><tr>
                    <th>Order Type</th>
                    <th>Name</th>
                    <th>Tires</th>
                    <th>Oils</th>
                    </tr></thead>";
        $i=0;

        foreach($data as $order){
            foreach($order as $orderItem){
                // orderItem is an object
                if($i%2==0){
                    echo "<tr class=\"oddRow\">";                            
                }
                else{
                    echo "<tr class=\"evenRow\">";
                }

                echo "<td>" . $orderItem->type . "</td>"; 
                echo "<td>" . $orderItem->name . "</td>"; 
                echo "<td>" . $orderItem->tires . "</td>"; 
                echo "<td>" . $orderItem->oils . "</td>";                 
                }
            }

            echo "</table>\n";
?>            
                
            <table>
            </table>
<?php
        }
?>            
        </section>
<?php
    }
}
?>
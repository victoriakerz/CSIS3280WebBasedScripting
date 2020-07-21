<?php
class Page  {

    public static $title = "Please set your title!";

    static function header()   { ?>
        <!-- Start the page 'header' -->
        <!DOCTYPE html>
        <html>
            <head>
                <title></title>
                <meta charset="utf-8">
                <meta name="author" content="Bambang">
                <title><?php echo self::$title; ?></title>   
                <link href="css/styles.css" rel="stylesheet">     
            </head>
            <body>
                <header>
                    <h1>Week 09 Demo: PDO CRUD</h1>
                </header>
                <article>
    <?php }

    static function footer()   { ?>
        <!-- Start the page's footer -->            
                </article>
            </body>

        </html>

    <?php }

    static function listBooks($bookData)    {
    ?>
        <!-- Start the page's show data form -->
        <section class="main">                
            <h2>Current Data</h2>
            <table>
                    <thead><tr>
                        <th>ISBN</th>                        
                        <th>Title</th>
                        <th>Author</th>
                        <th>Price</th>
                        <th>Delete (?)</th>                        
                    </tr></thead>
    <?php
        // code how you want to list them here
  
    }

    static function showAddForm()   { ?>        
        <!-- Start the page's add entry form -->
        <section class="form1">
                <h2>Add a new entry</h2>
                <form method="post" ACTION="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    ISBN: <input type="text" name="isbn" size=30 placeholder="X-XXX-XXXXX-X"><br>
                    Title: <input type="text" name="title" size=30 placeholder="Book Title"><br>
                    Author: <input type="text" name="author" size=30 placeholder="Book Author"><br>
                    Price: <input type="text" name="price" size=30 placeholder="Book Price XX.XX"><br>
                    <input type="submit" name="submit" value="Add entry">
                </form>
            </section>

    <?php }
}
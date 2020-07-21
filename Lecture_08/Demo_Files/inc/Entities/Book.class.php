
<?php

// mysql> DESC books;
// +--------+------------+------+-----+---------+-------+
// | Field  | Type       | Null | Key | Default | Extra |
// +--------+------------+------+-----+---------+-------+
// | ISBN   | char(13)   | NO   | PRI | NULL    |       |
// | Author | char(50)   | YES  |     | NULL    |       |
// | Title  | char(100)  | YES  |     | NULL    |       |
// | Price  | float(4,2) | YES  |     | NULL    |       |
// +--------+------------+------+-----+---------+-------+
// 4 rows in set (0.03 sec)

// The class properties must eXaCtLY similar to the column name

class Book  {

    private $ISBN;
    private $Author;
    private $Title;
    private $Price;


    //Getters
    

    //Setters
    
}

?>
<?php

class BooksDAO {

    //Place to store the PDO Agent/Service class    

    // you must initialize the PDOAgent
    static function initialize(string $className)   {                

    }

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
    
    // function to create (insert) book
    static function createBook(Book $newBook) : int   {
        
    }

    // function to get (select) book(s)
    static function getBooks() : Array {        
        
    }

    // function to delete book, we should use try catch
    static function deleteBook(string $isbn) : bool {

    }

}

?>
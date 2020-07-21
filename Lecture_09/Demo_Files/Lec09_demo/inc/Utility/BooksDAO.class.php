<?php

class BooksDAO {

    //Place to store the PDO Agent/Service class    
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className)   {                
        self::$db = new PDOAgent($className);
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
        $sqlInsert = "INSERT INTO books (ISBN, Author, Title, Price)
                        VALUES (:isbn, :author, :title, :price)";
        
        self::$db->query($sqlInsert);

        //bind
        self::$db->bind(':isbn', $newBook->getISBN());
        self::$db->bind(':author', $newBook->getAuthor());
        self::$db->bind(':title', $newBook->getTitle());
        self::$db->bind(':price', $newBook->getPrice());

        // execute
        self::$db->execute();

        return self::$db->lastInsertId();
    }

    // function to get (select) book(s)
    static function getBooks() : Array {        
        $selectAll = "SELECT * FROM books;";

        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet(); 
    }

    // function to delete book, we should use try catch
    static function deleteBook(string $isbn) : bool {
        $sqlDelete = "DELETE FROM books WHERE ISBN = :isbn;";

        // careful with delete
        try{
            self::$db->query($sqlDelete);
            self::$db->bind(':isbn',$isbn);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                // we fail in deleting
                throw new Exception("Problem in deleting the book $isbn");
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            self::$db->debugDumpParams();
            return false;
        }

        return true;
    }

}

?>
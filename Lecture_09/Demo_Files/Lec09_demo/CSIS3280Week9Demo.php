<?php

//Config
require_once("inc/config.inc.php");
//Entities
require_once("inc/Entities/Book.class.php");
require_once("inc/Entities/Page.class.php");
//Utility Classes
require_once("inc/Utility/BooksDAO.class.php");
require_once("inc/Utility/PDOAgent.class.php");

// initialize the BooksDAO
BooksDAO::initialize("Book");

// check if there's a GET to perform delete
if(!empty($_GET)){
    if($_GET["action"]=="delete"){
        BooksDAO::deleteBook($_GET["isbn"]);
    }
}

//Process any post data to add a new book
if (!empty($_POST)) {
    //Assemble the book
    $nb = new Book();
    $nb->setISBN($_POST["isbn"]);
    $nb->setTitle($_POST["title"]);
    $nb->setAuthor($_POST["author"]);
    $nb->setPrice($_POST["price"]);

    //Add the book to the database
    BooksDAO::createBook($nb);
}

// get the books
$books = BooksDAO::getBooks();

// display the page
Page::$title = "CSIS 3280 Week 9 demo";
Page::header();
Page::listBooks($books);
Page::showAddForm();
Page::footer();

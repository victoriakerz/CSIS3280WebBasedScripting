<?php

$host = "localhost";
$port = 3308;
$dbName = "books";
$user = "root";
$password = "";

// construct dsn
$dsn = "mysql:host=" . $host;   // attach the driver and host
$dsn .= ";dbname=" .$dbName;    // attach the database name. Notice the ;
$dsn .= ";port=" .$port;

echo "dsn $dsn";

// specifying the options
$options = array(
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

// use try catch to connect

try{
    $dbh = new PDO($dsn, $user, $password, $options);
}
catch(PDOException $e){
    printf("Connection Error: %s",$e->getMessage());
}

/*
mysql> desc books;
+--------+------------+------+-----+---------+-------+
| Field  | Type       | Null | Key | Default | Extra |
+--------+------------+------+-----+---------+-------+
| ISBN   | char(13)   | NO   | PRI | NULL    |       |
| Author | char(50)   | YES  |     | NULL    |       |
| Title  | char(100)  | YES  |     | NULL    |       |
| Price  | float(4,2) | YES  |     | NULL    |       |
+--------+------------+------+-----+---------+-------+
4 rows in set (0.01 sec)
*/
// insert --> Create
$query = "INSERT INTO books (ISBN, Author, Title, Price)
            VALUES ('1-123-12345','Bambang', 'PHP Made Easy', '99.99')";
//$dbh->exec($query);     // we are not expecting any query result. thus using exec()

// update --> Update
$query = "UPDATE books
            SET ISBN = '1-123-12345-1'
            WHERE ISBN = '1-123-12345'";

//$affected = $dbh->exec($query);
//echo "\nTotal rows affected: $affected";


// select --> Read
$sql = "SELECT * FROM books";
$rows = $dbh->query($sql);  // we use query(), expecting to get query result(s);

foreach($rows as $row){
    printf("\n%s\t%s (%s) is \$%s",$row['Title'],$row['Author'],$row['ISBN'],$row['Price']);
}











?>
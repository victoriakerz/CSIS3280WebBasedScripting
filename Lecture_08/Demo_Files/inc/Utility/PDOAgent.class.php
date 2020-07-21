<?php

//Reference https://culttt.com/2012/10/01/roll-your-own-pdo-php-class/

class PDOAgent    {

    //Database connection details
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    // the DSN
    private $dsn = "";

    // the class
    private $className;

    //the error
    private $error;

    // the Prepared Statement
    private $stmt;

    //Store the PDO object!!
    private $pdo;

    public function __construct(string $className)  {  

        //Copy the class name. Why do we need it?    

        //Build DSN
        
        // PDO options

        // try catch to connect

    }

    //Prepare the statement for execution
    public function query(string $query)    {
        
    }

    // bind the parameter
    public function bind($param, $value, $type = null)  {  
        
    }

   //Execute
   public function execute($data = null)  {
       
   }
   
   //Return a single result
   public function singleResult()   {
       
        //Executethe statement
        
        //set fetch mode to return classes
        
   }

   //Return resultSet
   public function resultSet()  {
       //Executethe statement
       
   }

   //Return the rowcount
   public function rowCount() : int   {
       return $this->stmt->rowCount();
   }
   
    //Get the lastInsertedID
    public function lastInsertId(): int{  
        return $this->pdo->lastInsertId();  
    }
   //Get the debug info
   public function debugDumpParams()    {
       return $this->stmt->debugDumpParams();
   }
}
?>
<?php

//DeptID	ShortName	LongName

class DepartmentDAO  {

    //Static DB member to store the database
    private static $db;

    //Initialize the DepartmentDAO
    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }

    //Get all the Department
    static function getDepartment() {
        // SELECT        
        $selectAll = "SELECT * FROM Department;";
        //Prepare the Query
        self::$db->query($selectAll);
        //Return the results
        self::$db->execute();
        //Return the resultSet
        return self::$db->resultSet();
    }
}
?>
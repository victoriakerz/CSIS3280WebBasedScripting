<?php

//FeedbackID	FullName	Email	DeptID
/*
+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| FeedbackID    | int(11)     | YES  |     | NULL    |       |
| FullName      | varchar(50) | YES  |     | NULL    |       |
| Email         | varchar(50) | YES  |     | NULL    |       |
| NumberOfTerms | tinyint(3)  | YES  |     | NULL    |       |
| DOB           | date        | YES  |     | NULL    |       |
| DeptID        | tinyint(3)  | YES  | MUL | NULL    |       |
| Feedback      | tinytext    | YES  |     | NULL    |       |
+---------------+-------------+------+-----+---------+-------+
*/

class FeedbackDAO  {

    //Static DB member to store the database    
    private static $db;
    //Initialize the FeedbackDAO    
    static function initialize(string $className)    {
        //Remember to send in the class name for this DAO
        self::$db = new PDOService($className);
    }
    // One of the functionality for the class abstracted by this DAO: CREATE
    // Remember that Create means INSERT
    static function createFeedback(Feedback $newFeedback) {
        $sqlInsert = "INSERT INTO feedback (FeedbackID, FullName, Email, DOB, NumberOfTerms, DeptID)
        VALUES (:feedbackid, :fullname, :email, :dob, :numberofterms, :deptid);";
        // QUERY BIND EXECUTE RETURN
        self::$db->query($sqlInsert);
        self::$db->bind(':feedbackid',$newFeedback-> getFeedbackID());
        self::$db->bind(':fullname',$newFeedback ->getFullName());
        self::$db->bind(':email', $newFeedback ->getEmail());
        self::$db->bind(':dob',$newFeedback ->getDOB());
        self::$db->bind(':numberofterms',$newFeedback ->getNumberOfTerms());
        self::$db->bind(':deptid',$newFeedback ->getDeptID());
        self::$db->execute();
        return self::$db->lastInsertedId();
    }
    // GET = READ = SELECT
    // This is for a single result.... when do I need it huh?
    static function getFeedback(int $FeedbackId)  {
       $selectSingle = "SELECT * FROM feedback WHERE FeedbackID = :feedbackid;";
        //QUERY, BIND, EXECUTE, RETURN
        self::$db->query($selectSingle);
        self::$db->bind(':feedbackid', $FeedbackId);
        self::$db->execute();
        return self::$db->singleResult();
    }
    // GET = READ = SELECT ALLL
    // This is to get all feedbacks
    static function getFeedbacks() {
        // I don't need any parameter here, do I need to bind?
        $selectMany = "SELECT * from feedback;";
        self::$db->query($selectMany);
        self::$db->execute();
        return self::$db->resultSet();
        
        //Prepare the Query
        //execute the query
        //Return results
    }
    // UPDATE means update    
    static function updateFeedback (Feedback $FeedbackToUpdate) {
        $updateSingle = "UPDATE Feedback
            SET FullName = :fullname,
            Email = :email, DOB = :dob, NumberOfTerms = :numberofterms, DeptID = :deptid
            WHERE FeedbackID = :feedbackid;";
        //QUERY, BIND, EXECUTE
        // Return the rowCount
        self::$db->query($updateSingle);
        self::$db->bind(':fullname', $_POST['fullName']);
        self::$db->bind(':dob', $_POST['dob']);
        self::$db->bind(':numberofterms', $_POST['terms']);
        self::$db->bind(':deptid', $_POST['deptID']);
        self::$db->bind(':feedbackid', $FeedbackToUpdate->getFeedbackID());
        self::$db->execute();
        return self::$db->rowCount();
    }
    // DELETE
    static function deleteFeedback(int $FeedbackId) {

        // Yea...yea... it is a drill like the one before        
        $deleteSingle = "DELETE FROM feedback WHERE FeedbackID = :feedbackId;";

        // careful with delete
        try{
            self::$db->query($deleteSingle);
            self::$db->bind(':feedbackId',$FeedbackId);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                // we fail in deleting
                throw new Exception("Problem in deleting the feedback $FeedbackId");
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            return false;
        }
    }
    // WE NEED TO USE JOIN HERE
    // Make sure to select from both tables joined at the correct column
    static function getFeedbackList() {
        $getListQuery = "SELECT feedback.FeedbackID, feedback.FullName, feedback.DOB, feedback.NumberOfTerms, department.ShortName FROM feedback JOIN department ON feedback.DeptID = department.DeptID;";

        self::$db->query($getListQuery);
        self::$db->execute();
        return self::$db->resultSet();
        //Prepare the Query
        //execute the query
        //Return row results
    }
}
?>
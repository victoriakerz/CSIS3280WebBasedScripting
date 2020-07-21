<?php

class Feedback {

// We need all columns except the Feedback column!

private $FeedbackID;
private $FullName;
private $Email;
private $DeptID;
private $DeptName;
private $DOB;
private $NumberOfTerms;

    public function getFeedbackID()  {
        return $this->FeedbackID;
    }

    public function getFullName()  {
        return $this->FullName;
    }

    public function getEmail()  {
        return $this->Email;
    }

    public function getDeptID()  {
        return $this->DeptID;
    }

    public function getDeptName()  {
        return $this->DeptName;
    }

    public function getDOB()  {
        return $this->DOB;
    }

    public function getNumberOfTerms()  {
        return $this->NumberOfTerms;
    }

    public function setFeedbackID( $FeedbackID){
        $this->FeedbackID = $FeedbackID;
    }

    public function setFullName( $FullName){
        $this->FullName = $FullName;
    }

    public function setEmail( $Email){
        $this->Email = $Email;
    }

    public function setDeptID( $DeptID){
        $this->DeptID = $DeptID;
    }

    public function setDeptName( $DeptName){
        $this->DeptName = $DeptName;
    }

    public function setDOB( $DOB){
        $this->DOB = $DOB;
    }

    public function setNumberOfTerms( $NumberOfTerms){
        $this->NumberOfTerms = $NumberOfTerms;
    }
}
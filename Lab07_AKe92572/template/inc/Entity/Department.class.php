<?php

Class Department    {

    //Attributes
    private $DeptID;
    private $ShortName;
    private $LongName;

    public function getDeptID()
    {
        return $this->DeptID;
    }

    public function getShortName($deptId)
    {
        return $this->ShortName;
    }

    public function getLongName()
    {
        return $this->LongName;
    }

    public function setDeptID($DeptID)
    {
        $this->DeptID = $DeptID;
    }

    public function setShortName($ShortName)
    {
        $this->ShortName = $ShortName;
    }

    public function setLongName($LongName)
    {
        $this->LongName = $LongName;
    }
}

?>
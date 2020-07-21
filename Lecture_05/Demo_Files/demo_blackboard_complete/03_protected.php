<?php

class Staff
{
    private $name;
    private $title;
    protected $wage;
    function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    function __destruct()
    {
        echo "Staff class instance destroyed.\n";
    } 
    protected function clockIn() {
        echo "Staff $this->name clocked in at ".date("h:i:s")."\n";
    }
    protected function clockOut() {
        echo "Staff $this->name can clock out at ".date("h:i:s",strtotime('8 hours'))."\n";
    }
    public function workingHour(){
        $this->clockIn();
        $this->clockOut();
    }
}

$people = new Staff('Joe', 'clerk');
$people->workingHour();

?>
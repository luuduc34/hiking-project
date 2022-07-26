<?php
class addHikeCheck extends addHikeDb
{
    private $name;
    private $difficulty;
    private $date;
    private $distance;
    private $durationH;
    private $durationM;
    private $elevation;
    private $description;
    private $userId;

    public function __construct($name, $difficulty, $date, $distance, $durationH, $durationM, $elevation, $description, $userId)
    {
        $this->name = $name;
        $this->difficulty = $difficulty;
        $this->date = $date;
        $this->distance = $distance;
        $this->durationH = $durationH;
        $this->durationM = $durationM;
        $this->elevation = $elevation;
        $this->description = $description;
        $this->userId = $userId;
    }
    public function submitHike()
    {
        session_start();
        if ($this->emptyInput() == false) {
            header("location: addHike");
            $_SESSION['error'] = "Form incomplete";
            exit();
        }
        if ($this->sessionCheck() == false) {
            header("location: addHike");
            $_SESSION['error'] = "User not logged in";
            exit();
        }
        if ($this->distanceCheck($this->distance) == false) {
            header("location: addHike");
            $_SESSION['error'] = "Invalid distance, check it ! => " . $this->distance;
            exit();
        }
        if ($this->hoursCheck($this->durationH) == false) {
            header("location: addHike");
            $_SESSION['error'] = "Invalid hours, check it ! => " . $this->durationH;
            exit();
        }
        if ($this->minuteCheck($this->durationM) == false) {
            header("location: addHike");
            $_SESSION['error'] = "Invalid minutes, check it ! => " . $this->durationM;
            exit();
        }
        if ($this->elevationCheck($this->elevation) == false) {
            header("location: addHike");
            $_SESSION['error'] = "Do you really want to climb this ? => " . $this->elevation;
            exit();
        }
        $this->setHike($this->name, $this->difficulty, $this->date, $this->distance, $this->durationH, $this->durationM, $this->elevation, $this->description, $this->userId);
    }
    private function emptyInput()
    {
        $result = null;
        if (
            empty($this->name) || empty($this->date) || empty($this->distance) ||
            empty($this->elevation) || empty($this->description) || empty($this->difficulty) ||
            (empty($this->durationH) && empty($this->durationM))
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function sessionCheck()
    {
        $result = null;
        if (empty($this->userId)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function distanceCheck($number)
    {
        $result = null;
        if (!preg_match("/^\d{1}\d{0,2}((,|\.)\d)?$/", $number)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function hoursCheck($numberH)
    {
        $result = null;
        if (!preg_match("/^[0-9]{1,3}$/", $numberH) && !empty($numberH)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function minuteCheck($numberM)
    {
        $result = null;
        if (!preg_match("/^[0-5]{0,1}[0-9]{1}$/", $numberM) && !empty($numberM)){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function elevationCheck($number)
    {
        $result = null;
        if (!preg_match("/^[0-9]{1,4}$/", $number)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

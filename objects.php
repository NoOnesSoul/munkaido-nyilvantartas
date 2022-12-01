<?php

use function PHPSTORM_META\type;

class Day {
    public $year;
    public $month;
    public $daynum;
    public $dayname;
    public $dateday;
    public $date;
    public $type;

    function setDate($Y, $M, $D) {
        $this->year = $Y;
        $this->month = $M;
        $this->daynum = $D;
        if($this->daynum < 10) {
            $this->dateday = "0".$this->daynum;
        } else {
            $this->dateday = $this->daynum;
        }
        $this->date = $Y."-".$M."-".$this->dateday;
        switch (date('N', strtotime($this->date))) {
            case 1:
                $this->dayname = "H";
                break;
            case 2:
                $this->dayname = "K";
                break;
            case 3:
                $this->dayname = "Sze";
                break;
            case 4:
                $this->dayname = "Cs";
                break;
            case 5:
                $this->dayname = "P";
                break;
            case 6:
                $this->dayname = "Szo";
                break;
            case 7:
                $this->dayname = "V";
        }

        if(isset($_SESSION['specialdays'])) {
            for($i=0; $i<=count($_SESSION['specialdays'])-1; $i++) {
                if($this->date == $_SESSION['specialdays'][$i]['date']) {
                    switch($_SESSION['specialdays'][$i]['type']) {
                        case 1:
                            if($_SESSION['specialdays'][$i]['name'] == "Áthelyezett pihenőnap") {
                                $this->type = "athelyezettPihenonap";
                            } else {
                                $this->type = "munkaszunetiNap";
                            }
                            break;
                        case 2:
                            if($_SESSION['specialdays'][$i]['name'] == "Áthelyezett munkanap") {
                                $this->type = "athelyezettMunkanap";
                            }
                    }
                }
            }
            if(!isset($this->type)) {
                switch($this->dayname) {
                    case "Szo":
                    case "V":
                        $this->type = "pihenonap";
                        break;
                    default:
                        $this->type = "munkanap";
                }
            }
        }
    }
}
?>
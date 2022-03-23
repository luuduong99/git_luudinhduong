<?php

    abstract class Country
    {
	    use Active;

        protected $slogan;

        abstract public function sayHello();

        public function setSlogan ($slogan) 
        {
            $this->slogan = $slogan;
        }
    }

    interface Boss 
    {
        public function checkValidSlogan();
    }

    class EnglandCountry extends Country implements Boss
    {
        public function sayHello() 
        {
            $england = "england";
            $english = "english";

            return strpos($this->slogan, $england) !== false || strpos($this->slogan, $english) !== false;

        }

        public function checkValidSlogan() 
        {
            if($this->sayHello() !== false) {
                return true;
            } return false;
        }

    }


    class VietnamCountry extends Country implements Boss 
    {

        public function sayHello() 
        {
            $vietnam = "vietnam";
            $hust = "hust";

            return strpos($this->slogan, $vietnam) !== false && strpos($this->slogan, $hust) !== false;

        }

        public function checkValidSlogan() 
        {
            if($this->sayHello() !== false) {
                return true;
            } return false;
    
        }

    }
    
    Trait Active 
    {
 	    public function defindYourSelf()
        {
 		    return get_class($this);
 	    }
    }
    $EnglandCountry = new EnglandCountry();
    $VietnamCountry = new VietnamCountry();

    echo 'I am ' . $EnglandCountry->defindYourSelf(); 
    echo "<br>";
    echo 'I am ' . $VietnamCountry->defindYourSelf(); 

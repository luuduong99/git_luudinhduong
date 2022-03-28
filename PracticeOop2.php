<?php

trait Active 
{
    public function defindYourSelf() 
    {
        return get_class($this);
    }
}

abstract class Country
{
    use Active;
    protected $slogan;

    public function setSlogan($slogan) 
    {
        return $this->slogan = $slogan;
    }

    abstract public function sayHello();
}

interface Boss
{
    public function checkValidSlogan();
}

class EnglandCountry extends Country implements Boss
{
    public function sayHello()
    {
        return "Hello";
    }
    
    public function checkValidSlogan() 
    {
        $str = strtolower($this->slogan);
        if (strpos($str, "england") !== false || strpos($str, "english") !== false) {
            return true;
        }
        return false;
        
    }
}

class VietnamCountry extends Country implements Boss 
{
    use Active;
    public function sayHello()
    {
        return "Xin chào";
    }
    public function checkValidSlogan()
    {
        $str = strtolower($this->slogan);
        if (strpos($str, "vietnam") !== false && strpos($str, "hust") !== false) {
            return true;
        } 
        return false;
        
    }
}

$englandCountry = new EnglandCountry();
$vietnamCountry = new VietnamCountry();

$englandCountry->setSlogan("England is a country that is part of the United Kingdom. It shares land borders with Wales to the west and Scotland to the north. The Irish Sea lies west of England and the Celtic Sea to the southwest.");
$vietnamCountry->setSlogan("Vietnam is the easternmost country on the Indochina Peninsula. With an estimated 94.6 million inhabitants as of 2016, it is the 15th most populous country in the world.");

echo $englandCountry->sayHello();    
echo "</br>";
echo $vietnamCountry->sayHello();  

echo "</br>";

var_dump($englandCountry->checkValidSlogan());    
echo "<br>";
var_dump($vietnamCountry->checkValidSlogan());    
echo "<br>";

echo 'I am ' . $englandCountry->defindYourSelf();
echo "<br>";
echo 'I am ' . $vietnamCountry->defindYourSelf();
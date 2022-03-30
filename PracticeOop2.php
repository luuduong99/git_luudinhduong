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

    public function getSlogan()
    {
        return $this->slogan;
    }

    abstract public function sayHello();
}

interface Boss
{
    public function checkValidSlogan($str, $text1, $text2);
}

class EnglandCountry extends Country implements Boss
{
    public function sayHello()
    {
        return "Hello";
    }
    
    public function checkValidSlogan($str, $text1, $text2) 
    {
        $test = strtolower($str);
        if (strpos($test, $text1) !== false || strpos($test, $text2) !== false) {
            return true;
        }

        return false;
    }
}

class VietnamCountry extends Country implements Boss 
{
    public function sayHello()
    {
        return "Xin chào";
    }
    public function checkValidSlogan($str, $text1, $text2)
    {
        $test = strtolower($str);
        if (strpos($test, $text1) !== false && strpos($test, $text2) !== false) {
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

$tex1 = "england";
$text2 = "english";
$str1 = $englandCountry->getSlogan();
var_dump($englandCountry->checkValidSlogan($str1, $tex1, $text2));    
echo "<br>";

$text1 = "vietnam";
$text2 = "hust";
$str2 = $vietnamCountry->getSlogan();
var_dump($vietnamCountry->checkValidSlogan($str2, $text1, $text2));    
echo "<br>";

echo 'I am ' . $englandCountry->defindYourSelf();
echo "<br>";
echo 'I am ' . $vietnamCountry->defindYourSelf();

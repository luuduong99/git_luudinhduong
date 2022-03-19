<?php

    class ExerciseString 
    {

        public $check1;
        public $check2;

        function readFile($a) 
        {
            $readFile = file_get_contents($a);
            $check = checkValidString($readFile);
            
            if($check) {
                if($a == "file1.txt") {
                    $check1 = true;
                }if ($a == "file2.txt") {
                    $check2 = true;
                }
                echo '<br/>Hợp lệ';
            }else {
                if ($a == "file1.txt") {
                    $check1 = false;
                }if ($a == "file2.txt") {
                    $check2 = false;
                }
                echo '<br/>Không hợp lệ';
  
            }

        }
}

    function checkValidString($a)
    {
        $book = "book";
        $res = "restaurant";
        if (strpos($a, $book) !== false && strpos($a, $res) === false ) {
            return true;
        } else if (strpos($a, $book) === false && strpos($a, $res) !== false) {
            return true;
        } return false;
    }

    $object1 = new ExerciseString;
    $object1 -> readFile('file1.txt');
    $object2 = new ExerciseString;
    $object2 -> readFile('file2.txt');

    
<?php

    class ExerciseString 
    {

        public $check1;
        public $check2;

        function readFile($file) 
        {
            $readFile = file_get_contents($file);
            $check = checkValidString($readFile);
            
            if($check) {
                if($file == "file1.txt") {
                    $check1 = true;
                }if ($file == "file2.txt") {
                    $check2 = true;
                }
                echo '<br/>Hợp lệ';
            }else {
                if ($file == "file1.txt") {
                    $check1 = false;
                }if ($file == "file2.txt") {
                    $check2 = false;
                }
                echo '<br/>Không hợp lệ';
  
            }

        }
    }

    function checkValidString($file)
    {
        $file1 = 'book';
        $file2 = 'restaurant';

        if ((strpos($file, $file1) !== false && strpos($file, $file2) === false) || (strpos($file, $file1) === false && strpos($file, $file2) !== false) ) { 
            return true; 
        } return false;

    }

    $object1 = new ExerciseString;
    $object1 -> readFile('file1.txt');
    $object2 = new ExerciseString;
    $object2 -> readFile('file2.txt');

    
<?php
    
    function checkValidString($str)
    {
        $str1 = 'book';
        $str2 = 'restaurant';

        if ((strpos($str, $str1) !== false && strpos($str, $str2) === false) || (strpos($str, $str1) === false && strpos($str, $str2) !== false) ) { 
            return true; 
        } return false;

    }

    function checkFile()
    {
        $file1 = "Lorem Ipsum is simply dummy  text of the printing and typesetting industry. Lorem Ipsum hasbeen the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $file2 = "There are many variations of passages of lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.";


        $check1 = checkValidString($file1);
        $check2 = checkValidString($file2);
        
        $count = 0;
        if ($check1) {
            $count = substr_count($file1, ".");
            echo "<h1>Chuỗi ở file1 là chuỗi hợp lệ và số câu là: $count</h1><br>";
        } else {
            echo "<h1>Chuỗi ở file1 là chuỗi không hợp lệ</h1><br>";
        }
        $count1 = 0;
        if ($check2) {
            $count1 = substr_count($file2, ".");
            echo "<h1>Chuỗi ở file2 là chuỗi hợp lệ và số câu là: $count1</h1><br>";
        } else {
            echo "<h1>Chuỗi ở file2 là chuỗi không hợp lệ</h1><br>";
        }
        
    } 
    
    checkFile();

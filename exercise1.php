<?php
    
    function checkValidString($str, $str1, $str2) 
    {
        if (((strstr($str, $str1) !== false) && (strstr($str, $str2) === false))
           || ((strstr($str, $str1) === false) && (strstr($str, $str2) !== false))
        ) {
            return true;
        }
        return false;
     }

    $str1 = "book";
    $str2 = "restaurant";

    function checkFile($file, $str1, $str2)
    {
        $str = file_get_contents($file);
        if (checkValidString($str, $str1, $str2)) {
            echo "Chuỗi hợp lệ và số câu của chuỗi là: " . substr_count($str, ".");
        } else {
            echo "Chuỗi không hợp lệ";
        }
         
    } 

    checkFile("file1.txt", $str1, $str2);
    echo "<br>";
    checkFile("file2.txt", $str1, $str2);

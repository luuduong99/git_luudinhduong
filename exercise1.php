<?php
    
    function checkValidString($str, $text1, $text2) 
    {
        if (((strstr($str, $text1) !== false) && (strstr($str, $text2) === false))
           || ((strstr($str, $text1) === false) && (strstr($str, $text2) !== false))
        ) {
            return true;
        }
        return false;
     }

    function checkFile($file, $text1, $text2)
    {
        $str = file_get_contents($file);
        if (checkValidString($str, $text1, $text2)) {
            echo "Chuỗi hợp lệ và số câu của chuỗi là: " . substr_count($str, ".");
        } else {
            echo "Chuỗi không hợp lệ";
        }
         
    } 

    $text1 = "book";
    $text2 = "restaurant";
    checkFile("file1.txt", $text1, $text2);
    echo "<br>";
    checkFile("file2.txt", $text1, $text2);

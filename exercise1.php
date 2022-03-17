<?php
    function checkValidString($a)
    {
        $b = "book";
        $c = "restaurant";
        if (strpos($a, $b) !== false && strpos($a, $c) === false ) {
            return true;
        } else if (strpos($a, $b) === false && strpos($a, $c) !== false) {
            return true;
        } else {
            return false;
        }
    }
    function checkFile()
    {
        $file1 = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $file2 = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.";
        $check1 = checkValidString($file1);
        $check2 = checkValidString($file2);
        
        $d = 0;
        if ($check1 == true){
            $d = substr_count($file1,".");
            echo "<h1>Chuỗi ở file1 là chuỗi hợp lệ và số câu là: $d</h1><br>";
        } else {
            echo "<h1>Chuỗi ở file1 là chuỗi không hợp lệ</h1><br>";
        }
        $e = 0;
        if ($check2 == true) {
            $e = substr_count($file2,".");
            echo "<h1>Chuỗi ở file2 là chuỗi hợp lệ và số câu là: $e</h1><br>";
        } else {
            echo "<h1>Chuỗi ở file2 là chuỗi không hợp lệ</h1><br>";
        }
    } 
    checkFile();

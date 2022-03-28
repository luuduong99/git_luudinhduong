<?php

    class ExerciseString 
    {
        public $check1;
        public $check2;

        function getCheck1()
        {
            return $this->check1;
        }

        function getCheck2()
        {
            return $this->check2;
        }

        public function readFile($file)
        {
            $data = file_get_contents($file);
            return $data;
        }

        function checkValidString($str, $text1, $text2) 
        {
            if (((strstr($str, $text1) !== false) && (strstr($str, $text2) === false))
                || ((strstr($str, $text1) === false) && (strstr($str, $text2) !== false))) {
                return true;
            }
            return false;
        }

        public function writeFile($text, $resultFile)
        {
            $result = fopen($resultFile, "w") or die("Unable to open file!");
            fwrite($result, $text);
            fclose($result);
        }
    }

    $text1 = "book";
    $text2 = "restaurant";
    $resultFile = "result_file.txt";
    $object1 = new ExerciseString();
    $data1 = $object1->readFile('file1.txt');
    $data2 = $object1->readFile('file2.txt');
    $count = substr_count($data2, ".");
    $object1->check1 = $object1->checkValidString($data1, $text1, $text2);
    var_dump($object1->getCheck1());    
    $line1 = "Check1 là chuỗi " . ($object1->getCheck1() == true ? "Hợp lệ\n" : "Không hợp lệ\n");
    echo "</br>";
    $object1->check2 = $object1->checkValidString($data2, $text1, $text2);
    var_dump($object1->getCheck2());    
    $line2 = 'Check2 là chuỗi "' . ($object1->getCheck2() == true ? "hợp lệ" : "không hợp lệ") . '". Chuỗi có ' . $count . " câu.";
    $text = $line1 . $line2;
    $object1->writeFile($text, $resultFile);
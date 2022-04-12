<?php

function getInstance ()
{
    $conn = new PDO('mysql:host=db;dbname=luuduong99', 'duong', 'duong');
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    return $conn;
}
function executeQuery ($query)
{
    $conn = getInstance();
    $statement = $conn->prepare($query);
    $statement->execute();
    return $statement;
}

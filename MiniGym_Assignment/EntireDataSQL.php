<?php

function getUsers (){
    $db = new SQLITE3('C:\xampp\Database_Assignment\miniGym.db');
    $sql = "SELECT * FROM customer";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    
    
    while ($row = $result->fetchArray()){ 
        $arrayResult [] = $row; 
    }
    return $arrayResult;
}
?>
<?php
function forgotten($username) //passes username to find out if rest of database data matches username
{
    $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db');
    $sql = "SELECT username, datebirth, email, postcode FROM customer WHERE username = :username";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':username', $username, SQLITE3_TEXT);

    $result = $stmt->execute();

    return $result;
}
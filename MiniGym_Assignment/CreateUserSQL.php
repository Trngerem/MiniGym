<?php
function createUser(){

    $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db'); // db connection - get your db file here. Its strongly advised to place your db file outside htdocs. 
    $sql = 'INSERT INTO customer(username, fname, lname, datebirth, email, postcode, password) VALUES (:username, :fname, :lname, :datebirth, :email, :postcode, :password)';
    $stmt = $db->prepare($sql); //prepare the sql statement
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $username = createusername($fname, $lname);

    //give the values for the parameters
    $stmt->bindParam(':username', $username, SQLITE3_TEXT); //we use SQLITE3_TEXT for text/varchar. You can use SQLITE3_INTEGER or SQLITE3_REAL for numerical values
    $stmt->bindParam(':fname', $fname, SQLITE3_TEXT); 
    $stmt->bindParam(':lname', $lname, SQLITE3_TEXT);
    $stmt->bindParam(':datebirth', $_POST['datebirth'], SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':postcode', $_POST['postcode'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['password'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if($stmt){
        $created = true;
    }
    
    return $username;

}

function createusername($fname, $lname){

    $ran = 0;
    $ran2 = 0;
    $ran = rand(0,9);
    $ran2 = rand(0, 9);

    $f1 = $fname[0];
    $f2 = $fname[1];
    $f3 = $fname[2];

    $l = substr($lname, -2);

    $username = $f1 . $f2 . $f3 . $l . $ran . $ran2;

    return $username;
}
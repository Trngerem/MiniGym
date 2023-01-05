<?php
function createStaff(){

    $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db'); 
    $sql = 'INSERT INTO staff(id, fname, lname, email, status, role, pwd) VALUES (:id, :fname, :lname, :email, :status, :role, :pwd)';
    $stmt = $db->prepare($sql); //prepare the sql statement
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    $username = createusername($fname, $lname);

    //give the values for the parameters
    $stmt->bindParam(':id', $username, SQLITE3_TEXT);
    $stmt->bindParam(':fname', $fname, SQLITE3_TEXT); 
    $stmt->bindParam(':lname', $lname, SQLITE3_TEXT);
    $stmt->bindParam(':email', $_POST['email'], SQLITE3_TEXT);
    $stmt->bindParam(':status', $_POST['status'], SQLITE3_TEXT);
    $stmt->bindParam(':role', $_POST['role'], SQLITE3_TEXT);
    $stmt->bindParam(':pwd', $_POST['pwd'], SQLITE3_TEXT);

    //execute the sql statement
    $stmt->execute();
    
    //the logic
    if($stmt){
        $created = true;
    }
    
    return $username;

}

function createusername($fname, $lname){ //passes the already inputted first name and last name

    $ran = 0;
    $ran2 = 0;
    $ran = rand(0,9);       //random int between 1 AND 9
    $ran2 = rand(0, 9);

    $f1 = $fname[0];
    $f2 = $fname[1];
    $f3 = $fname[2];

    $l = substr($lname, -2);        //last 2 characters of lastname

    $username = $f1 . $f2 . $f3 . $l . $ran . $ran2;

    return $username;
}
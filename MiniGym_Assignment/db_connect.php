<?php 

$db = new SQLite3("C:\\xampp\\Database_Assignment\\miniGym.db"); //checks if the databse is connected properly
 
if($db){
    echo "Database is successfully connected";
}

else{
    echo "Database is not connected";
}
?>
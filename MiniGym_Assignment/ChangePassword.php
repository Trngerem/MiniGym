<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">


<?php
require("NavBar.php");
?>
<style>
</style>    

<?php

if (isset($_POST['submit'])){

  $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db');
  $sql = "UPDATE customer SET password = :password WHERE username = :username";
  $stmt = $db->prepare($sql);

  $stmt->bindParam(':username',$_GET['username'], SQLITE3_TEXT); //discuss this!
  $stmt->bindParam(':password',$_POST['password'], SQLITE3_TEXT);

  $stmt->execute();

  header('Location: UserLogin.php');
}?>

<body class="bgColor">
        	<main role="main center">
  				<h2 class="title">Change Password</h2>
                    <p>For Username <?php echo $_GET['username']?></p>
                  <div class="row center">
            
                    <form method="post">
                        <label>Password</label>
                        <input type="text" name = "password">
                        <input type="submit" name="submit" value="Update" class="btn btn-primary" class="center">

</body>

<?php require("Footer.php");?>



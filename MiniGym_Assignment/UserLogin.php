<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">

<?php
require("NavBar.php");
?>

<style>
</style>    

<?php

if (isset($_POST['submit'])) { //once button is clicked

    $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db');
    $sql = "SELECT username, password FROM customer WHERE username = :username OR password = :password";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':username', $_POST['user'], SQLITE3_TEXT);
    $stmt->bindParam(':password', $_POST['pass'], SQLITE3_TEXT);


   $result = $stmt->execute();

   while ($row = $result->fetchArray(SQLITE3_NUM)) { //uses php to use iteration to display the query result
        $arrayresult[] = $row;
    }
    
    $allFields = "yes";

    if($arrayresult[0][0] != $_POST['user']) {      //if user doesnt match passwords username 
        $allFields = "no";
    } 
    else if ($arrayresult[0][1] != $_POST['pass']) {    //if password doesnt match username password
        $allFields = "no";
    } 
    else if ($allFields == "yes") { //if all fields is still yes because none of the other vairables have changed it to no
        header('Location:SignedIn.php?username='.$_POST['user']);
    }
}
?>


<body class = "bgColor">
    <main>
        <h1 class="center title">Customer Login Page</h1>
        
        <article style="float: left; 
		width: 80%; height: 600px;">
		
        <?php
        if(isset($_GET['uid'])): ?>
            <a class="alert alert-warning"><strong>You're username is : </strong><?php echo $_GET['uid']; ?></a>
                </button>
            </div>
        <?php endif; ?>
        

			<div id="form">
				<div class="box">
					<form method="post">
						<h2>Login</h2>
						<input type="text" placeholder="username" name="user">
						<input type="password" placeholder="password" name="pass">
						<input type="submit" value="Login" name="submit">
					</form>
				</div>



        <a class="bottom btn btn-primary" href="ForgotPassword.php">Forgot Password?</a>
        <a class="btn btn-primary" href="StaffLogin.php">Staff Login</a>
    </main>

</body>

<?php require("Footer.php");?>

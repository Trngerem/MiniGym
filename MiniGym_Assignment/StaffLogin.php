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
$sql = "SELECT id, pwd, role FROM staff WHERE id = :username OR pwd = :password";
$stmt = $db->prepare($sql);

$stmt->bindParam(':username', $_POST['user'], SQLITE3_TEXT);
$stmt->bindParam(':password', $_POST['pass'], SQLITE3_TEXT);


$result = $stmt->execute();

while ($row = $result->fetchArray(SQLITE3_NUM)) {
    $arrayresult[] = $row;
}

$allFields = "yes";

if($arrayresult[0][0] != $_POST['user']) {      //if user doesnt match passwords username in database
    $allFields = "no";
} 
else if ($arrayresult[0][1] != $_POST['pass']) {    //if password doesnt match usernames password in database
    $allFields = "no";
} 
else if ($allFields == "yes") { //if all fields is still yes because none of the other vairables have changed it to no

    header('Location:StaffSignedIn.php?username=' . $_POST['user']);
}
}
?>

<body class = "bgColor">
    <main>
        <h1 class="center title">Staff Login Page</h1>
        
        <?php
        if(isset($_GET['uid'])): ?>
            <a class="alert alert-warning"><strong>You're ID is : </strong><?php echo $_GET['id']; ?></a>
                </button>
            </div>
        <?php endif; ?>

        <article style="float: left; 
		width: 80%; height: 600px;">
	
			<div id="form">
				<div class="box">
					<form method="post">
						<h2>Login</h2>
						<input type="text" placeholder="ID" name="user">
						<input type="password" placeholder="password" name="pass">
						<input type="submit" value="Login" name="submit">
					</form>
				</div>



        <a class="bottom btn btn-primary" href="ForgotPassword.php">Forgot Password?</a>
        <a class="btn btn-primary" href="UserLogin.php">Customer Login</a>
    </main>

</body>


<?php require("Footer.php");?>
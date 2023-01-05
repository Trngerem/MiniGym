<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">

<?php
require("NavBar.php");
?>

<style>
</style>    


<body class = "bgColor">
<main>
        <h1 class="title">Welcome to Mini Gym Associative</h1>
        <p style="padding-top : 50px"><u>About us</u>:</p>
            <ul>
                <li>We work hard to make sure you enjoy you're work out experience in our gym</li>
                <li>We hope to see you return often and encourage you to take part in our free lessons in off peak times</li>
                <li>We hope to make the world a healthier and fitter world to be a part of</li>
            </ul>
        <a style="padding-bottom : 30px">There are two types of memberships you can take advantage of dear customers:</a>
            <ul style="padding-right : 20px; padding-top : 10px">
                <li>Day Passes - £5.50</li>
                <li style="padding-bottom:100px">Monthly - £13.50</li>
            </ul>

        <a href="CreateUser.php" style="color:red"class='btn btn-default'>Create Account</a>
</main>

</body>

<?php require("Footer.php");?>

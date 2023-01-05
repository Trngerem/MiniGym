<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">


<?php
require("NavBar.php");
?>
<style>
</style>    

<body class= "bgColor">
    <main>
        <h1 class="title center">Main Page for <?php echo $_GET['username'] ?></h1>
        <ul>
            <a class="btn btn-primary" href="AccountDetails.php?username=<?php echo $_GET['username']; ?>">Account details</a>
        </ul>
    </main>

</body>

<?php require("Footer.php");?>
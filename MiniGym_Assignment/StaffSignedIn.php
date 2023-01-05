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
        <a href="EntireData.php" class="btn btn-primary">All customers</a>
        <a href="AllStaff.php" class="btn btn-primary">All Staff</a>
        <a href="CreateStaff.php" class="btn btn-primary">Create Staff</a>
    </main>

</body>



<?php require("Footer.php");?>
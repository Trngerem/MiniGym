<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">


<?php
require("NavBar.php");
include_once("ForgotPasswordSQL.php");
?>
<style>
</style>   

<?php

$errordob = $erroremail = $errorpostcode = "";
if (isset($_POST['submit'])) {

    $username = $_POST['uid'];

    $result = forgotten($username);

    if ($result == null) {

    } 
    else {

        while ($row = $result->fetchArray(SQLITE3_NUM)) { //uses php to use iteration to display the query result
            $arrayresult[] = $row;
        }

        $allFields = "yes";

        if ($arrayresult[0][1] != $_POST['datebirth']) {
            $errordob = "Wrong details";
            $allFields = "no";
        } else if ($arrayresult[0][2] != $_POST['email']) {
            $erroremail = "Wrong details";
            $allFields = "no";
        } else if ($arrayresult[0][3] != $_POST['postcode']) { //if empty but written a different way
            $errorpostcode = "Wrong details";
            $allFields = "no";
        } else if ($allFields == "yes") { //if all fields is still yes because none of the other vairables have changed it to no
            header('Location:ChangePassword.php?username='.$_POST['uid']);
        }
    }
}
?>

<body class = "bgColor">
    <main>
        <h1 class="center title"><u>Reset Password</u></h1>
        <div style="padding-top:50px">
            <strong>Please enter the following details to prove  your identity:</strong>

            <div class="row center">
            <div class="col-12">
                <form method="post">
        
                   <div class="form-group">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name = "uid">
                   </div>

                   <div class="form-group">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "postcode">
                        <span class="text-danger"><?php echo $errorpostcode; ?></span>
                   </div>

                   <div class="form-group">
                        <label class="control-label labelFont">Email Address</label>
                        <input class="form-control" type="text" name = "email">
                        <span class="text-danger"><?php echo $erroremail; ?></span>
                   </div>

                   <div class="form-group">
                        <label class="control-label labelFont">Date Of Birth</label>
                        <input class="form-control" type="text" name = "datebirth">
                        <span class="text-danger"><?php echo $errordob; ?></span>
                   </div>

                   <div class="form-group col-md-4" style="padding:50px">
                    <?php $buttonclicked = false;?>
                        <input class="btn btn-primary" type="submit" name ="submit">
                        <?php $buttonclicked = true;
                       if($buttonclicked == true){?>
                          
                         <?php }?>

        </div>
    </main>

</body>



<?php require("Footer.php");?>
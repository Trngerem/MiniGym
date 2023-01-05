<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">

<?php require("NavBar.php");
include_once("CreateStaffSQL.php");


$errorfname = $errorlname = $erroremail = $errorpassword = ""; //declares the varaibles to check at the end if the creation of user is valid or not
$allFields = "yes";

if (isset($_POST['submit'])){

    if ($_POST['fname'] == null){ //if empty
        $errorfname = "First name is mandatory"; //becomes an output at the end after clicking create
        $allFields = "no"; //all field is set as no since this option isnt filled
    }

    else if ($_POST['lname'] == null){ 
        $errorlname = "Last name is mandatory";
        $allFields = "no";
    }

    else if ($_POST['email'] == null){
        $errordob = "Email is mandatory";
        $allFields = "no";
    }
    else if ($_POST['pwd'] == null){
        $errordob = "Password is mandatory";
        $allFields = "no";
    }

    else if($allFields == "yes") //if all fields is still yes because none of the other vairables have changed it to no
    {
        $createStaff = createStaff(); //finally create Staff using the data inputted
        header('Location:StaffLogin.php?id='.$createStaff);
    }
}

?>
<body class="bgcolor">
	<div class="container">
        	<main role="main" class="pb-3">
  			<h2>Create Staff</h2>

            <div class="row">
            <div class="col-6">
                <form method="post">
                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname">
                        <span class="text-danger"><?php echo $errorfname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname">
                        <span class="text-danger"><?php echo $errorlname; ?></span>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Email</label>
                        <input class="form-control" type="text" name = "email">
                        <span class="text-danger"><?php echo $erroremail; ?></span>
                   </div>

                   <div class="form-group col-md-4">
                        <label class="control-label labelFont">Status</label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                   </div>

                   <div class="form-group col-md-4">
                        <label class="control-label labelFont">Role</label>
                        <select name="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                        </select>
                   </div>

                   <div class="form-group col-md-6">
                        <label class="control-label labelFont">Default Password</label>
                        <input class="form-control" type="password" name = "pwd">
                        <span class="text-danger"><?php echo $errorpassword; ?></span>
                   </div>


                   <div class="form-group col-md-4">
                    <?php $buttonclicked = false;?>
                        <input class="btn btn-primary" type="submit" value="Create User" name ="submit">
                        <?php $buttonclicked = true;
                       if($buttonclicked == true){
                          
                        }
                        ?>
                   </div>
                </form>
            </div>
        </div>

		</main>
	</div>
</body>


<?php require("Footer.php");?>
                       
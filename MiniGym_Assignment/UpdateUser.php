<?php require("NavBar.php");

if (isset($_POST['submit'])){

  $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db');
  $sql = "UPDATE customer SET username = :uname, fname = :fname, lname = :lname, datebirth = :datebirth, email = :email, postcode = :postcode WHERE username = :uname";
  $stmt = $db->prepare($sql);

  $stmt->bindParam(':uname',$_POST['uname'], SQLITE3_TEXT);
  $stmt->bindParam(':fname',$_POST['fname'], SQLITE3_TEXT);
  $stmt->bindParam(':lname',$_POST['lname'], SQLITE3_TEXT);
  $stmt->bindParam(':datebirth',$_POST['dob'], SQLITE3_TEXT);
  $stmt->bindParam(':email',$_POST['email'], SQLITE3_TEXT);
  $stmt->bindParam(':postcode',$_POST['postcode'], SQLITE3_TEXT);


  $stmt->execute();

  header('Location:AccountDetails.php?username='.$_GET['uid']);
}



?>

	<div class="bgColor">
        	<main role="main" class="pb-3">
  				<h2 class="title center">Update Account Details</h2>

                  <div class="row">
            <div class="col-11">
                <form method="post">

                <div class="form-group col-md-3">
                        <label class="control-label labelFont">Username</label>
                        <input class="form-control" type="text" name = "uname">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">First Name</label>
                        <input class="form-control" type="text" name = "fname">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Last Name</label>
                        <input class="form-control" type="text" name = "lname">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">DOB</label>
                        <input class="form-control" type="text" name = "dob">
                   </div>

                   <div class="form-group col-md-3">
                    <label class="control-label labelFont">Email</label>
                    <input class="form-control" type="text" name = "email">
                   </div>

                   <div class="form-group col-md-3">
                        <label class="control-label labelFont">Postcode</label>
                        <input class="form-control" type="text" name = "postcode">
                   </div>

                   <div class="form-group col-md-3">
                       <input type="submit" name="submit" value="Update" class="btn btn-primary">
                   </div>
                   <div class="form-group col-md-3"><a href="AccountDetails.php">Back</a></div>
                </form>

            </div>
        </div>
		</main>
	</div>

<?php require("Footer.php");?>
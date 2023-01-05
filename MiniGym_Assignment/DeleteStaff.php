<?php require("NavBar.php");

$db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db');
$sql = "SELECT id, fname, lname, email, status, role FROM staff WHERE id=:id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':is', $_GET['id'], SQLITE3_TEXT); 
$result= $stmt->execute();

while($row=$result->fetchArray(SQLITE3_NUM)){ //uses php to use iteration to display the query result
    $arrayResult [] = $row; 
}

if (isset($_POST['delete'])){ //if statement which is entered into when the user clicks on delete

    $db = new SQLite3('C:\xampp\Database_Assignment\miniGym.db');

    $stmt = "DELETE FROM staff WHERE id = :stdID";
    $sql = $db->prepare($stmt);
    $sql->bindParam(':stdID', $_POST['id'], SQLITE3_TEXT);

    $sql->execute();
    header("Location:AllStaff.php?deleted=true"); //return to view user but passes deleted=true in order to display a success message
}


?>

<div class="bgColor">
    <main role="main" class="pb-3">
  	    <h2>Delete Staff</h2>
        <h2>Delete Account for <?php echo $_GET['id'];?></h2><br>
        <h4 style="color: red;">Are you sure want to delete this Staff?</h4><br>
        
        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">ID</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][0] ?></label> <!--displays user name since thats in that position-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">First Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][1] ?></label><!--Displays first name-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Last Name</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][2] ?></label><!--displays last name-->
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <label style="font-size: 20px; color:blue; font-weight: bold;">Email</label>
            </div>
            <div class="col-md-6">
                <label style="font-size: 20px;"><?php echo $arrayResult[0][3] ?></label><!--displays email-->
            </div>
        </div>

        <div class="row">
            <div class="col-5">
                <form method="post">
                     <input type="hidden" name="uid" value = "<?php echo $_GET['id'] ?>"><br>
                    <input type="submit" value="Delete" class="btn btn-danger" name="delete"><a href="AllStaff.php" style="font-weight: bold; padding-left: 30px;">Back</a>
                </form>
            </div>
        </div>

            
            </main>

</div>


  <?php require("Footer.php");?>

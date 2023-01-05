<!doctype html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheet.css/">


<?php
require("NavBar.php");
?>
<style>
</style>    

<?php
if (isset($_GET['username'])) {   //if theres a username passed
    $db = new SQLITE3('C:\xampp\Database_Assignment\miniGym.db');
    $sql = "SELECT username, fname, lname, datebirth, email, postcode FROM customer WHERE username = :username";
    $stmt = $db->prepare($sql);
    $result = $stmt->execute();
    

    $stmt->bindParam(':username', $_GET['username'], SQLITE3_TEXT);


    while ($row = $result->fetchArray()) {
        $arrayresult[] = $row;
    }
    ?>

<body class= "bgColor">
    <main>
        <h1 class="title center">Account Details</h1>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped"> <!--table header titles-->
                    <thead class="table-dark">
                        <td>Username</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>DOB</td>
                        <td>Email</td>
                        <td>Postcode</td>
                        <td>Update</td>
                    </thead>
                    <tr>
                        <td><?php echo $arrayresult[0]['username']; ?></td>
                        <td><?php echo $arrayresult[0]['fname']; ?></td>
                        <td><?php echo $arrayresult[0]['lname']; ?></td>
                        <td><?php echo $arrayresult[0]['datebirth']; ?></td>
                        <td><?php echo $arrayresult[0]['email']; ?></td>
                        <td><?php echo $arrayresult[0]['postcode']; ?></td>
                        <td><a href="UpdateUser.php?uid=<?php echo $_GET['username']; ?>" class="btn btn-info">Update</a></td>
                      
                    </tr>
                </table>    
            </div>
        </div>
    </main>

</body>
<?php
    } 

require("Footer.php");?>
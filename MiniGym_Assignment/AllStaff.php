<?php require("NavBar.php");
include_once("AllStaffSQL.php");
$user = getStaff();
?>

	<div class="bgColor">
        <main role="main" class="pb-3">
  			<h2 class="center title">Staff Database</h2>

            <div class="container pb-5">
                <main role="main" class="pb-3">
                    
                    <?php if(isset($_GET['deleted'])): ?>
            <div class="alert alert-danger alert-dismissible fade show col-10" role="alert" style="font-weight: bold;">
                The user has been deleted
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>


                    <div class="row">
            <div class="col-12">
                <table class="table table-striped"> <!--table header titles-->
                    <thead class="table-dark">
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Status</td>
                        <td>Role</td>
                        <td>Password</td>
                        <td>Update</td>
                        <td>Delete</td>
                    </thead>

                    <?php
                        for ($i=0; $i<count($user); $i++): //outputs the rows
                    ?>
                    <tr>
                        <td><?php echo $user[$i]['id']?></td>
                        <td><?php echo $user[$i]['fname']?></td>
                        <td><?php echo $user[$i]['lname']?></td>
                        <td><?php echo $user[$i]['status']?></td>
                        <td><?php echo $user[$i]['role']?></td>
                        <td><?php echo $user[$i]['pwd']?></td>
                        <td><a href="UpdateStaff.php?id=<?php echo $user[$i]['id']; ?>" class="btn btn-info">Update</a></td>
                        <td><a href="deleteStaff.php?id=<?php echo $user[$i]['id']; ?>" class="btn btn-danger">Delete</a></td>
                      </tr>
                    <?php endfor;?> <!--this is what ends the for loop previously declared within the php tags-->
                </table>    
            </div>
        </div>
                 </main>
            </div>

		</main>
	</div>

<?php require("Footer.php");?>

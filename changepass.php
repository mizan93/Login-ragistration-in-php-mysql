<?php
include 'User.php';
include 'header.php';
Session::checkLogin();
?>
<?php
if (isset($_GET['id'])) {
    # code...
    $userid = (int) $_GET['id'];
    $sesid=Session::get('id');
    if($userid !=$sesid){
     header("Location: indext.php");
    }
}
$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])) {
    # code...
    $updatepass = $user->updatepassword($userid, $_POST);
}
?>
<section class="body-section  py-2">
    <div class="container">
        <div class="row bg-light py-2">
            <div class="col-sm-6 text-left ">
                <h2>Change Password</h2>
            </div>
            <div class="col-sm-6 mt-2 text-right">
                <a class="btn btn-primary" href="profile.php?id=<?php echo $userid?>">Go to profile</a>
            </div>
        </div>
        <?php
        if (isset($updatepass)) {
            echo  $updatepass;
        }
        ?>

        <form action="profile.php" method="post" style=" max-width:600px; margin:0 auto;">
            <div class="form-group">
                <label for="old_pass">Old Password:</label>
                <input id="old_pass" name="old_pass" type="password" class="form-control" placeholder="Enter old passwrd" >
            </div>
            <div class="form-group">
                <label for="new_pass">New Password:</label>
                <input id="new_pass" name="new_pass" type="password" class="form-control" placeholder="Enter new passwrd" >
            </div>

            <button type="submit" name="updatepass" class="btn btn-success">Updatepass</button>

        </form>

    </div>
</section>
<?php
include 'footer.php';
?>
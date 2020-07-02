<?php
include 'header.php';
include 'User.php';
?>
<?php

$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'post' && isset($_POST['login'])) {
    $userlogin = $user->userRagistraition($_POST);
}
?>
<section class="body-section  py-2">
    <div class="container">
        <div class="row bg-light py-2">
            <div class="col  ">
                <h2>User Login</h2>
            </div>

        </div>
        <?php
        if (isset($userlogin)) {
            # code...
            echo $userlogin;
        }
        ?>
        <form action="login.php" method="post" style=" max-width:600px; margin:0 auto;">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" id="email" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" id="pwd" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
</section>
<?php
include 'footer.php';
?>
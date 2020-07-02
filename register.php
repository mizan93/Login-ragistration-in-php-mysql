<?php
include 'header.php';
include 'User.php';
?>
<?php

$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'post' && isset($_POST['ragister'])) {
    $userRegi = $user->userRagistraition($_POST);
}
?>
<section class="body-section  py-2">
    <div class="container">
        <div class="row bg-light py-3">
            <div class="col  ">
                <h2>User Ragistration</h2>
            </div>

        </div>
        <?php
        if (isset($userRegi)) {
            # code...
            echo $userRegi;
        }
        ?>
        <form class="py-3" action="register.php" method="post" style=" max-width:600px; margin:0 auto;">
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input id="username" name="username" type="text" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input id="password" name="password" type="password" class="form-control" placeholder="Enter password">
            </div>

            <button type="submit" name="ragister" class="btn btn-primary">Ragister</button>
        </form>
    </div>
</section>
<?php
include 'footer.php';
?>
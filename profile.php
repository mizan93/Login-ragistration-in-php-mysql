<?php
include 'header.php';
?>
<section class="body-section  py-2">
    <div class="container">
        <div class="row bg-light py-2">
            <div class="col-sm-6 text-left ">
                <h2>User Profile</h2>
            </div>
            <div class="col-sm-6 mt-2 text-right">
                <a class="btn btn-primary" href="indext.php">Bact</a>
            </div>
        </div>
        <form action="/action_page.php" method="post" style=" max-width:600px; margin:0 auto;">
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" name="name" type="text" class="form-control" placeholder="Enter email" id="email" value="Dellowar Hossain">
            </div>
            <div class="form-group">
                <label for="username">Name:</label>
                <input id="username" name="username" type="text" class="form-control" placeholder="Enter email" id="email" value="Dellowar">
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" id="email" value="Dellowar@gmail.com">
            </div>


            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>
</section>
<?php
include 'footer.php';
?>
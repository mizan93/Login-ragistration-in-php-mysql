<?php 
include 'header.php';
include 'User.php';
$user=new User();
?>
<?php 
   $loginmsg=Session::get("loginmsg");
   if (isset($loginmsg)) {
    
    echo $loginmsg;

   }

?>
<section class="body-section text-center py-2">
<div class="container">
    <div class="row bg-light py-2">
        <div class="col-sm-6 text-left ">
            <h2>User list</h2>
        </div>
        <div class="col-sm-6 mt-2 text-right">
            <span><strong>Wellcome!</strong></span>
        </div>
        <?php 
          $name=Session::get("name");

          if ($name) {
            echo $name;
          }
        ?>
    </div>

   <table class="table table-bordered  table-hover">
    <thead class="bg-light">
      <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>01</td>
        <td>Delwar</td>
        <td>Delowar Hossain</td>
        <td>delwar@gmail.com</td>
        <td><a class="btn btn-primary" href="profile.php?id=1">View</a></td>
      </tr>
      <tr>
        <td>02</td>
        <td>Kawsar</td>
        <td>Kawser Ahmed</td>
        <td>kawser@gmail.com</td>
        <td><a class="btn btn-primary" href="profile.php?id=1">View</a></td>
      </tr>
      <tr>
        <td>03</td>
        <td>Ariful Islam</td>
        <td>Ariful </td>
        <td>ariful@gmail.com</td>
        <td><a class="btn btn-primary" href="profile.php?id=1">View</a></td>
      </tr>
      
      
    </tbody>
  </table>
</div>
</section>
<?php 
include 'footer.php';
?>
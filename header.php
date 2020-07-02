<?php 
        $filepath= realpath(dirname(__FILE__));
        include_once $filepath.'/./Session.php';
        Session::init();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR system using php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


</head>
    <?php 
     if (isset($_GET['action']) && $_GET['action']=='logout' ) {
         # code...
         Session::destroy();
     }
    
    ?>


<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="indext.php">LR system</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    
                    <?php 
                      $id= Session::get('id');
                      $userlogin= Session::get('login');
                      if ($userlogin==true) {
                        
                    ?>
                    <li class="nav-item ">
                        <a class="nav-link" href="profile.php?id=<?php echo $id?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout">Logout</a>
                    </li>
                      <?php  }else{?>
                    <li class="nav-item">
                        <a class="nav-link " href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <?php 
                    } ?>

                </ul>

            </div>
        </nav>
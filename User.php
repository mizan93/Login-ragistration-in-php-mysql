<?php

include_once 'Session.php';
include 'Database.php';
class User{
    private $db;
     public function __construct(){
       $this->db=new Database();
     }
    public function userRagistraition($data){
      $name=$data['name'];
      $username=$data['username'];
      $email=$data['email'];
      $password=md5($data['password']);

      $check_email= $this->emailCheck($email);

      if ($name=="" || $username=="" || $email=="" || $password=="" ) {
          # code...
         $msg=" <div class='alert alert-danger'
            <strong>Error!</strong> Field must not be empty.
            </div>";
            return $msg;
      }
      
      if (strlen($username)<3) {
                  # code...
                  $msg = " <div class='alert alert-danger'
            <strong>Error!</strong> Username is too short.
            </div>";
                  return $msg;
           
      } 
      elseif(preg_match('/[^a-z0-9-]+/i',$username)){
                 
                  $msg = " <div class='alert alert-danger'
            <strong>Error!</strong> Username must only contain alphabet.
            </div>";
                  return $msg;

      }
      if (filter_var($email, FILTER_VALIDATE_EMAIL ) === false) {
                  # code...
                  $msg = " <div class='alert alert-danger'
            <strong>Error!</strong>Inavlid email.
            </div>";
                  return $msg;

      }
      if ($check_email == true) {
            # code...
           

                  $msg = " <div class='alert alert-danger'
            <strong>Error!</strong>Email address already exist!
            </div>";
                  return $msg;

      }

$sql= "INSERT INTO user_tbl (name,username,email,password) VALUES(:name,:username,:email,:password)";
             $query=$this->db->pdo->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':password', $password);
           $result= $query->execute();
           if($result){
                  $msg = " <div class='alert alert-success'
            <strong>Welcome!</strong> You have registared
            </div>";
                  return $msg;
         }
           else{

                  $msg = " <div class='alert alert-warning'
            <strong>Sorry!</strong>Something wrong!
            </div>";
                  return $msg;
   
           }

    }
     public function emailCheck($email){
      
        $sql = "SELECT email FROM user_tbl WHERE email= :email";
         $query=$this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email); 
        $query->execute();
if ($query->rowCount()>0) {
    # code...
    return true;
}else{
    return false;
}
    }

    public function userlogin($data){
  
      $email=$data['email'];
      $password=$data['password'];
     $check_email=$this->emailCheck($email);
      if($email=="" || $password=="" ){
         $msg="<div class='alert alert-danger'><strong>Error! </strong> Field must not be empty</div>";

         return $msg;

    }

if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      # code...
      $msg = " <div class='alert alert-danger'
            <strong>Error!</strong>Inavlid email.
            </div>";
      return $msg;
}
if ($check_email == true) {
      # code...


      $msg = " <div class='alert alert-danger'
            <strong>Error!</strong>Email address already exist!
            </div>";
      return $msg;
}

$result=$this->getloginuser($email,$password);
if ($result) {
      Session::init();
      Session::set("login",true);
      Session::set("id",$result->id );
      Session::set("name",$result->name );
      Session::set("username",$result->username );
      Session::set("loginmsg", $msg = " <div class='alert alert-success'
            <strong>Error!</strong>You are logedin!
            </div>");
            header("Location: indext.php"); 
}
else{
      $msg = " <div class='alert alert-danger'
            <strong>Error!</strong>Data not found!
            </div>";
}

}
    public function getloginuser($email, $password){
      $sql="SELECT * FROM user_tbl WHERE email=:email AND password=:password LIMIT 1";
      $query=$this->db->pdo->prepare($sql);
      $query->bindValue(':email',$email);
      $query->bindValue(':password',$password);
      $query->execute();
      $result=$query->fetch(PDO::FETCH_OBJ);
      return $result;
      
    }
   

}

?>
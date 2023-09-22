<?php
$success=0;
$user=0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //$sql = "INSERT INTO `registration` (username, password) VALUES ('$username', '$password')";
        // $result = mysqli_query($con, $sql);

        // if ($result) {
            // echo "Data inserted successfully";
        // } else {
            // die(mysqli_error($con));
        // }
        $sql="Select * from `registeration` where
        username='$username'";
        $result=mysqli_query($con,$sql);
        // if($result){
          $num=mysqli_num_rows($result);
          if($num>0){
            // echo "User already exist";
            $user=1;
          }else{
        $sql = "INSERT INTO `registration` (username, password) 
        VALUES ('$username', '$password')";
        $result = mysqli_query($con, $sql);
        if ($result) {
            // echo "Signup successful";
            $success=1;

        } else {
          die(mysqli_error($con));
        }
          }
        }
    }
?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Signup page</title>
  </head>
  <body>

  <?php
if($user){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error</strong> User already exist 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

  ?>
    <?php
if($success){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong>you are successfull signed up
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

  ?>
  <h1 class="text-center">Sign up page</h1>
     <div class="container mt-5">
     <form action="sign.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" 
    placeholder="Enter your username" name="username>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" 
    placeholder="Enter your password" name="password">
  </div>

  <button type="submit" class="btn btn-primary 
  w-100">Sign up</button>

</form>                             
     </div>


  </body>
</html>
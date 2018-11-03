<?php
 
$host="38.88.74.88";
$user="root";
$password="";
$db="users";
 
mysql_connect($host,$user,$password);
mysql_select_db($db);
 
if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from loginform where user='".$uname."'AND Pass='".$password."' limit 1";
    
    $result=mysql_query($sql);
    
    if(mysql_num_rows($result)==1){
        echo " You Have Successfully Logged in";
        exit();
    }
    else{
        echo " You Have Entered Incorrect Password";
        exit();
    }
        
}
?>

<!doctype html>
<!-- Theme obtained from bootstrap.com-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="loginAssets/pilogo.png">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="loginAssets/floating-labels.css" rel="stylesheet">
    <script type="text/javascript" src="loginAssets/login.js"></script>
  </head>

  <body>


    <form class="form-signin" method="POST" action="#">
    

      <div class="text-center mb-4">
        <img class="mb-4" src="loginAssets/pilogo.png" alt="" width="120" height="144">
        <h1 class="h3 mb-3 font-weight-normal">G3 Project 2</h1>
      </div>

      <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputEmail">Email address</label>
      </div>

      <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
     

      <button class="btn btn-lg btn btn-danger btn-block" type="submit" ">Sign in</button>
    

    </form>
  
  </body>

</html>
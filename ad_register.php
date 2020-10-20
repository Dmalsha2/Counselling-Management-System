


<?php

include('ad_header.php');
include('database_connection.php');



$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:index.php');
}

if(isset($_POST["register"]))
{
 $username = trim($_POST["username"]);
 
 $password = trim($_POST["password"]);
 
 $check_query = "
 SELECT * FROM admin 
 WHERE username = :username
 ";
 $statement = $connect->prepare($check_query);
 $check_data = array(
  ':username'  => $username
 );
 if($statement->execute($check_data)) 
 {
  if($statement->rowCount() > 0)
  {
   $message .= '<p><label>Username already taken</label></p>';
  }
  else
  {
   if(empty($username))
   {
    $message .= '<p><label>Username is required</label></p>';
   }
   if(empty($password))
   {
    $message .= '<p><label>Password is required</label></p>';
   }
   else
   {
    if($password != $_POST['confirm_password'])
    {
     $message .= '<p><label>Password not match</label></p>';
    }
   }
   if($message == '')
   {
    $data = array(
     ':username'  => $username,
    
     ':password'  => password_hash($password, PASSWORD_DEFAULT)
    );

    $query = "
    INSERT INTO admin 
    (username,password) 
    VALUES (:username,:password)
    ";
    $statement = $connect->prepare($query);
    if($statement->execute($data))
    {
     $message = "<label>Registration Completed</label>";
    }
   }
  }
 }
}

?>

<html>  
     
    <body>  
      
   
   <div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
   <div class="panel panel-default">
      <div class="panel-heading"><h2>Register</h2></div>
    </br>
    <div class="panel-body">
     <form method="post">
      <span class="text-danger"><?php echo $message; ?></span>

      <div class="form-group">
       <label>Enter Username</label>
       <input type="text" name="username" class="form-control" />
        </div>

     
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" class="form-control" />
      </div>
      <div class="form-group">
       <label>Re-enter Password</label>
       <input type="password" name="confirm_password" class="form-control" />
      </div>
      <div class="form-group">
       <input type="submit" name="register" id="register" class="btn btn-info" value="Register" />
      </div>
      <div align="center">
       
      </div>
     </form>
    </div>
   </div>
  </div>
  
  
  <script>

</script>
    </body>  
</html>


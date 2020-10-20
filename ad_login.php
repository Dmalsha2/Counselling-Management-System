
<?php

include('database_connection.php');

include('ad_header.php');

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:add.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM admin 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if(password_verify($_POST["password"], $row["password"]))
      {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['username'] = $row['username'];
        $sub_query = "
        INSERT INTO login_details 
        (user_id) 
        VALUES ('".$row['user_id']."')
        ";
        $statement = $connect->prepare($sub_query);
        $statement->execute();
        $_SESSION['login_details_id'] = $connect->lastInsertId();
        header("add.php");
      
     
      }
      else
      {
       $message = "<label>Wrong Password</label>";
      }
    }
 }
 else
 {
  $message = "<label>Wrong Username</labe>";
 }
}

?>

<html>  
    <head>  
       
  
    </head>  
    <body>  
       
   <br />
   
   <h3 align="center">Log In</a></h3><br />
   <br />
   <div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
   
      
    <div class="panel-body">
     <form method="post">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>Enter Username</label>
       <input type="text" name="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="Login" />
      </div>
	   <div align="center">
        </div>
     </form>
    </div>
   </div>
  </div>
  
    </body>  
</html>

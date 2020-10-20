


<?php


include('database_connection.php');
include('admin.php');
include('sidebar.php');

$message = '';

if(isset($_SESSION['user_id']))
{
 header('location:.php');
}

if(isset($_POST["register"]))
{
 $username = trim($_POST["username"]);
  $email = trim($_POST["email"]);
 
  $number = trim($_POST["num"]);

 
 $check_query = "
 SELECT * FROM teacher 
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
     ':email'  => $email,
  

    );

    $query = "
    INSERT INTO teacher 
    (username,email ,phoneNum,password) 
    VALUES (:username,:email ,:num ,:password)
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
     <head>
       <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counsalling Management System</title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <script src="css/js/jquery-3.4.1.min.js"></script>
    <script src="css/js/bootstrap.min.js"></script>
    <style>
          .my{
          position: absolute;
          top:30%; }
    </style>
       </head>
       <title></title>
     </head>
    <body>  
      <!--<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Counsalling Management System</a>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <ul class="navbar-nav ml-auto">
                
                <?php
                    if(isset($_SESSION['user_loggin'])){
                        ?>
                        
                        <?php
                    }else{
                      ?>
                              
                              <li class="nav-item">
                            <a class="nav-link" href="adminPa.html">Log Out</a>
                        </li>
                       
                              <li class="nav-item">
                            <a class="nav-link" href="front.html">Home</a>
                        </li>
                       
                      
                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>  -->

 
   <div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3" my>
		
       
    
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

         <div class="form-group">
       <label>Email</label>
       <input type="email" name="email" class="form-control" />
        </div>




     <div class="form-group">
       <label>Phone number</label>
       <input type="text" name="num"  class="form-control" />
        </div>
     
  
      <div class="form-group">
       <input type="submit" name="register" id="register" class="btn btn-info" value="Register" />
      </div>
      <div align="center">
       </div>
	   </div>
      </div>
     </form>
    </div>
   </div>
  </div>
  
  
  <script>

</script>
    </body>  
</html>


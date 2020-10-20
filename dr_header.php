<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Counsalling Management System</title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <script src="css/js/jquery-3.4.1.min.js"></script>
    <script src="css/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
                       
                              <li class="nav-item">
                            <a class="nav-link" href="front.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dr_login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dr_register.php">Register</a>
                        </li>
                        <?php
                    }
                ?>
            </ul>
        </div>
    </nav>
<?php
session_start();
?>
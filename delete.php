 <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
	

</head>
<body>
  <?php include("./delete_confirm_modal.php");?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Counsalling Management System</a>
        </nav>
  <div class="modal-fade" id="deletemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModelLebel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
             
           </div>
        </div>
      </div>


<div class="container">
    <div class="jumbotron">
     <div class="card">
         <div class="card-body">
            
     <?php
            $connect = mysqli_connect("localhost","root","");
            $sd= mysqli_select_db($connect,'system');
       
          $query = "SELECT * from login";
          $result_set= mysqli_query($connect, $query);
       ?>

        
             <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">user_id</th>
      <th scope="col">username</th>
      <th scope="col">email</th>
      <th scope="col">age</th>
      <th scope="col">address</th>
      <th scope="col">phoneNum</th>
        <th scope="col">Action</th>
        <!-- Button trigger modal -->

    </tr>
  </thead>

    <?php
        if($result_set)
        {
            foreach ($result_set as $row) 
            {
                ?>
  <tbody>
    <tr>
      
      <td><?php  echo $row['user_id'];?></td>
      <td><?php  echo $row['username'];?></td>
      <td><?php  echo $row['email'];?></td>
      <td><?php  echo $row['age'];?></td>
      <td><?php  echo $row['address'];?></td>
      <td><?php  echo $row['phoneNum'];?></td>
  
  

                <td><a class="btn btn-info" href="update.php?user_id=<?php echo $row['user_id']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="drop.php?user_id=<?php echo $row['user_id']; ?>">Delete</a></td>
             </tr>
  </tbody>


    <?php            
            }
        }
        else
        {
            echo "No record";
        }
       
?>

</table>
         </div>
     </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
       

</body>
</html>  
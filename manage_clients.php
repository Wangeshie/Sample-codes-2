<?php
session_start();
  include('includes/config.php');

if(!isset($_SESSION['adminlogin'])){

header('location:index.php');

}



if (isset($_POST['suspend'])){
$id=$_POST['id'];




  mysqli_query($conn,"UPDATE  clients SET status=1 WHERE id=$id");
 echo "<script> alert('Client suspended successfully');

 </script>";

}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage clients</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    

<link rel="stylesheet" href="../assets/bootstrap.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<body>
    <!-- Start Top Nav -->
  <?php  include('includes/top-header.php') ;   ?>
  <?php  include('includes/header.php') ;   ?>

<section><br>
  <div class="container-fluid">
    <div><center>
                        <a class="btn btn-primary" href="manage_clients.php">Active Clients</a>
                        <a class="btn btn-danger" href="suspended_clients.php">Suspended Clients</a>

                      </center></div><br>

                     <center> <h4>Active Clients</h4> </center>
                    
<table class="table table-bordered">
  <tr>
    <td>#</td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Email</td>
    <td>mobile Number</td>
    <td>Action</td>
  </tr>
 <?php

    $result=mysqli_query($conn,"SELECT  * FROM clients WHERE status=0");
$i=0;
    while($rows=mysqli_fetch_array($result)){
$i++;
     ?>


<tr>
  <td><?php echo $i ?></td>
<td><?php echo $rows['first_name']  ?></td>
<td><?php echo $rows['last_name']  ?></td>
<td><?php echo $rows['email']  ?></td>
<td><?php echo $rows['mobile_number']  ?></td>

<td>
  <form method="post">
<input hidden name="id" value="<?php echo $rows['id']  ?>" > 

  <button name="suspend" class="btn btn-danger" >Suspend</button> </td>
</form>

</tr>

<?php } ?>
</td>

</table>
</div>

</section>





















    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>

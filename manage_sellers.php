<?php
session_start();

  include('includes/config.php');
  if(!isset($_SESSION['adminlogin'])){
  
header('location:index.php');
}





 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage sellers</title>
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
  <center> <h4>Approved Sellers</h4> </center>

<div><center>
                        <a class="btn btn-primary" href="manage_sellers.php">Approved Sellers</a>
                        <a class="btn btn-success" href="unapproved_sellers.php">Unapproved Sellers</a>
                        <a class="btn btn-danger" href="suspended_sellers.php">Suspended Sellers</a></center></div><br>

<table class="table table-bordered">
  <tr>
    <td>#</td>
    <td>Business Name</td>
    <td>Email</td>
    <td>Phone number</td>
    <td>county</td>
    <td>area</td>
    <td>Status</td>
    <td>More Details</td>
  </tr>
<?php
  $result=mysqli_query($conn,"SELECT * FROM company where status=1");
  $i=0;
while($row=mysqli_fetch_array($result)){
  $i++;
  ?>


<tr>
  <td> <?php echo $i ?> </td>
  <td> <?php echo $row['name'] ?> </td>
  <td> <?php echo $row['email'] ?> </td>
  <td> <?php echo $row['company_phonenumber'] ?> </td>
  <td> <?php echo $row['county'] ?> </td>
  <td> <?php echo $row['area'] ?> </td>
  <td> Approved </td>
   <td><a href="more_details.php?id=<?php echo $row['company_id'] ?>" >More Details </a> </td>

</tr>

<?php } ?>




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

<?php
  session_start();
  include('includes/config.php');

if(!isset($_SESSION['adminlogin'])){

header('location:index.php');

}




$id= $_GET['id'];




if (isset($_POST['suspend'])){
$company_id=$_POST['company_id'];




  mysqli_query($conn,"UPDATE  company SET status=3 WHERE company_id=$company_id");
 echo "<script> alert('Seller suspended successfully');
window.location.href='manage_sellers.php';
 </script>";

}








 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>More details 1</title>
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



  <div style="float:none;margin:auto" class="col-md-5">
<div class="card">
 
    <?php
    $id=$_GET['id'];
    $result=mysqli_query($conn,"SELECT  * FROM company WHERE company_id=$id");

    while($rows=mysqli_fetch_array($result)){

     ?>

  <div class="card-body">
    <center><img class="card-img-top" src="../images/<?php echo $rows['image']  ?>"  style="width:250px"   alt="Card image cap"></center>

<center><p>  <b><?php echo $rows['name']  ?></b>  </p></center>
<b>Email:</b><?php echo $rows['email']  ?><br>
<b>Phone number:</b><?php echo $rows['company_phonenumber']  ?><br>
 <b>County:</b><?php echo $rows['county']  ?><br>
 <b>Area:</b><?php echo $rows['area']  ?><br>
  <b>Description:</b><?php echo $rows['description']  ?><br>
 <b>Licence/Certificate:</b> <a href="../seller/documents/<?php echo $rows['document']  ?>">Document.pdf</a><br>

<form method="post">
  <input hidden name="company_id" value="<?php echo $rows['company_id']  ?>"><br>
<center><button name="suspend" class="btn btn-danger">Suspend </button></center>
</form>
  </div><br>


</div>
<?php } ?>





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

<?php
session_start();
require_once("includes/config.php");
// Set total price of the product in the cart table
if (isset($_POST['qty'])) {
  $qty = $_POST['qty'];
  $pid = $_POST['pid'];
  $pprice = $_POST['pprice'];

  $tprice = $qty * $pprice;



mysqli_query($conn,"UPDATE cart SET pieces='$qty',total_amount='$tprice' WHERE id=$pid");


}














 ?>

<?php
session_start();
  include('includes/config.php');
if(!isset($_SESSION['waterlogin'])){
   
    $_SESSION['rdrurl'] = $_SERVER['REQUEST_URI'];

}

  $cookie_name = "cart";

  $random=rand(1000,10000);
  $random_time=time();

  $random_all=$random.$random_time;

  $cookie_value = $random_all;

  if(!isset($_COOKIE[$cookie_name])) {
  		 setcookie($cookie_name, $cookie_value, time() + (8640000 * 30), "/"); // 86400 = 1 day

  }

   $cookieswater=$_COOKIE[$cookie_name];

if(isset($_POST['clear'])){

mysqli_query($conn,"DELETE FROM cart WHERE cookies='$cookieswater'");


}

if(isset($_POST['delete'])){
  $iddelete=$_POST['deleteid'];

mysqli_query($conn,"DELETE FROM cart WHERE id='$iddelete'");


}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>BGD water cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    

<link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

</head>

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "adjust_quantity.php",
data:'quantity='+$("#quantity").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>





<body>
    <!-- Start Top Nav -->
  <?php  include('includes/top-header.php') ;   ?>
  <?php  include('includes/header.php') ;   ?>



<!--- cart start-->

<body>
  <br>


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="8">
                  <h4 class="text-center text-info m-0">Products in your cart.</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Company</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>

                <form method="post">
                  <button name="clear" class="badge-danger badge p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</button>
</form>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $cart=mysqli_query($conn,"SELECT * FROM cart WHERE cookies='$cookieswater'");
              $i=0;
              while($rowcart=mysqli_fetch_array($cart)){
                $i++;
              ?>
              <tr>
                <td><?php echo $i ?></td>

            <td><img src="images/<?php echo $rowcart['pic'] ?>" width="50"></td>


<td>
  <?php $cid= $rowcart['company_id'];
  $company=mysqli_query($conn,"SELECT * FROM company WHERE company_id=$cid");
  $company2=mysqli_fetch_array($company);
  echo $company2['name'];

    ?>




</td>

<input type="hidden" class="pid" value="<?php echo $rowcart['id'] ?>">
                <td><?php echo $rowcart['quantity'] ?></td>
                <td>
                  ksh&nbsp;&nbsp;<?php echo $rowcart['price'] ?>
                </td>
 <input type="hidden" class="pprice" value="<?php echo $rowcart['price'] ?>">

                <td>

                  <input type="number" class="form-control itemQty" value="<?php echo $rowcart['pieces'] ?>" style="width:75px;">
                </td>

                <td>ksh&nbsp;&nbsp;<?php echo $rowcart['total_amount'] ?></td>
                <td>
                  <form method="post">
                    <input hidden name="deleteid" value="<?php echo $rowcart['id'] ?>">
                  <button style="border:none" name="delete" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');"><i class="fas fa-trash-alt"></i></button>
</form>
                </td>
              </tr>

              <tr>

                <?php } ?>
                <td colspan="4">
                  <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><?php
$totalcart=mysqli_query($conn,"SELECT sum(total_amount) AS total FROM cart WHERE cookies='$cookieswater'");
$totalcart1=mysqli_fetch_array($totalcart);
echo  'ksh '.$totalcart1['total'];

?>


                </td>
                <td>

                  <a type="button" href="checkout.php"  title="You will be able to follow up your order" class="btn btn-info"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a><br><br>

                </td>

              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>




















<!-- cart end-->





































<script type="text/javascript" src="js/jquery.min.js"></script>



<script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'adjust_quantity.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,

          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });


  });
  </script>




    <!-- End Footer -->

    <!-- Start Script -->
   <script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
    <!-- End Script -->
</body>

</html>

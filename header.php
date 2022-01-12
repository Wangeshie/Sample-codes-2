<nav class="navbar navbar-expand-lg navbar-light shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
           BGD
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>



<li class="nav-item"
<?php
if(!isset($_SESSION['waterlogin'])){
  echo 'style="display:none;"';
}


?>><a class="nav-link" href="profile.php">Profile</a></li>



<li class="nav-item"
<?php
if(!isset($_SESSION['waterlogin'])){
  echo 'style="display:none;"';
}


?>><a class="nav-link" href="my_orders.php">My Orders</a></li>







                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">Contact</a>
                    </li>

<li class="nav-item">
                        <a class="nav-link" href="seller/index.php">Sellers Panel</a>
                    </li>


<li class="nav-item"
<?php
if(isset($_SESSION['waterlogin'])){
  echo 'style="display:none;"';
}


?>><a class="nav-link" href="login.php">Log In</a></li>

<li class="nav-item"
<?php
if(isset($_SESSION['waterlogin'])){
  echo 'style="display:none;"';
}


?>><a class="nav-link" href="signup.php">Sign Up</a></li>














<li class="nav-item"
<?php
if(!isset($_SESSION['waterlogin'])){
  echo 'style="display:none;"';
}


?>><a class="nav-link" href="logout.php">Logout</a></li>


 <li class="nav-item" <?php if (!isset($_SESSION['waterlogin'])){ echo 'style="display:none;"'; } ?>>
              <span style="color:red" class="nav-link" ><?php


              $email=$_SESSION['waterlogin'];
$usersinfo=mysqli_query($conn ,"SELECT * FROM clients WHERE email='$email'");
$details=mysqli_fetch_array($usersinfo);

echo 'Hi '.$details['first_name'];
 ?>

</span></li>



                </ul>













            </div>











            <div class="navbar align-self-center d-flex">
               
               
                <a class="nav-icon position-relative text-decoration-none" href="cart.php">
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
<?php
$cart=mysqli_query($conn,"SELECT * FROM cart where cookies='$cookieswater'");
$cart1=mysqli_num_rows($cart);
echo $cart1;

 ?>







                    </span>
                </a>

            </div>
        </div>

    </div>
</nav>

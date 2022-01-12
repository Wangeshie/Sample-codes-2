<?php
$cookie_name = "cart";

$random=rand(1000,10000);
$random_time=time();

$random_all=$random.$random_time;

$cookie_value = $random_all;

if(!isset($_COOKIE[$cookie_name])) {
     setcookie($cookie_name, $cookie_value, time() + (8640000 * 30), "/"); // 86400 = 1 day

}

$cookieswater=$_COOKIE[$cookie_name];
?>

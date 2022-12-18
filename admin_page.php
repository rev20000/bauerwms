<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/c4c7f2612b.js" crossorigin="anonymous"></script>
  </head>
  <body>
   <style>
body {
  background-image: url('BAUERIST.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>BAUER</header>
      <a href="#" class="active">
        <i class="fas fa-qrcode"></i>
        <span>Menu</span>
      </a>
      <a href="">
       <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
        <span>Dashboard</span>
      </a>
      <a href="supplier.php">
        <i class="fa-sharp fa-solid fa-truck"></i>
        <span>Supplier</span>
      </a>
      <a href="product.php">
      <i class="fa-sharp fa-solid fa-box"></i>
        <span>Products</span>
      </a>
      <a href="dropdown.php">
     <i class="fa-sharp fa-solid fa-dollar-sign"></i>
        <span>Orders</span>
      </a>
      <a href="#">
        <i class="far fa-question-circle"></i>
        <span>Report</span>
      </a>
      <a href="login_form.php">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
      </a>
    </div>
</body>
</html>
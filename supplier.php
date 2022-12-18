<?php

@include 'config.php';

if(isset($_POST['supplier'])){

   $supplier_name = $_POST['supplier_name'];
   $supplier_contact = $_POST['supplier_contact'];
   $supplier_email = $_POST['supplier_email'];
   $supplier_address = $_POST['supplier_address'];

   if(empty($supplier_name) || empty($supplier_contact) || empty($supplier_email) || empty($supplier_address)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO suppliers(name,contact, email, address) VALUES('$supplier_name', '$supplier_contact','$supplier_email', '$supplier_address')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'Process successfully';
      }else{
         $message[] = 'Could not process';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM suppliers WHERE id = $id");
   header('location:supplier.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Suppliers</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="style2.css">
   <link rel="stylesheet" href="style1.css">
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://kit.fontawesome.com/c4c7f2612b.js" crossorigin="anonymous"></script>
  </head>
  <body style="background-color:#E0FFFF;">
  <body>
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
        <span>Dashboard</span>
      </a>
      <a href="#">
       <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
        <span>Inventory</span>
      </a>
      <a href="supplier.php">
        <i class="fa-sharp fa-solid fa-truck"></i>
        <span>Supplier</span>
      </a>
      <a href="product.php">
      <i class="fa-sharp fa-solid fa-box"></i>
        <span>Products</span>
      </a>
      <a href="orders.php">
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
</head>
<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>Supplier</h3>
         <input type="text" placeholder="Enter Supplier name" name="supplier_name" class="box">
         <input type="number" placeholder="Enter Supplier contact" name="supplier_contact" class="box">
         <input type="text" placeholder="Enter Supplier email" name="supplier_email" class="box">
         <input type="text" placeholder="Enter Supplier address" name="supplier_address" class="box">
         <input type="submit" class="btn" name="supplier" value="+">
      </form>

   </div>
   <?php

   $select = mysqli_query($conn, "SELECT * FROM suppliers");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>name</th>
            <th>contact</th>
            <th>email</th>
            <th>address</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
            <td>#<?php echo $row['contact']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td>
               <a href="supp_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="supplier.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>
</div>


</body>
</html>
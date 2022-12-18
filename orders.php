<?php

@include 'config.php';

if(isset($_POST['add_order'])){

   $date_issued = $_POST['date_issued'];
   $supplier_name = $_POST['supplier_name'];
   $date_delivery = $_POST['date_delivery'];
   $product_name = $_POST['product_name'];
   $product_quantity = $_POST['product_quantity'];
   $order_status = $_POST['order_status'];


   if(empty($date_issued) || empty($supplier_name) || empty( $date_delivery) || empty($product_name) || empty($product_quantity) || empty($order_status)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO orders(dateiss,name,datedel,prodname,prodquan,orderstat) VALUES('$date_issued', '$supplier_name',' $date_delivery', '$product_name', '$product_quantity','$order_status')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'Order Processed successfully';
      }else{
         $message[] = 'Order Could not process';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM orders WHERE id = $id");
   header('location:orders.php');
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
         <h3>Orders</h3>
         <h1>Supplier Name:</h1><input type="text" placeholder="Enter Supplier name" name="supplier_name" class="box">
         <h1>Product Name:</h1><input type="text" placeholder="Enter Product Name" name="product_name" class="box">
         <h1>Total Item:</h1><input type="text" placeholder="Enter Product Quantity" name="product_quantity" class="box">
         <h1>Order Status:</h1><select name="order_status" class="box">
         <option value="Approved">Approved</option>
         <option value="Pending">Pending</option>
         </select>
         <h1>Date Issued:</h1><input type="date" name="date_issued" placeholder="dd-mm-yyyy" value=" "min="1990-01-01" max="2090-12-31">
         <h1>Delivery Date:</h1><input type="date" name="date_delivery" placeholder="dd-mm-yyyy" value=" "min="1990-01-01" max="2090-12-31">
         <input type="submit" class="btn" name="add_order" value="Add Order">
      </form>

   </div>
   <?php

   $select = mysqli_query($conn, "SELECT * FROM orders");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>supplier</th>
            <th>product</th>
            <th>total item</th>
            <th>status</th>
            <th>date issued</th>
            <th>date delivery</th>
            <th>action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['prodname']; ?></td>
            <td><?php echo $row['prodquan']; ?></td>
            <td><?php echo $row['orderstat']; ?></td>
            <td><?php echo $row['dateiss']; ?></td>
            <td><?php echo $row['datedel']; ?></td>
            <td>
               <a href="order_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="orders.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>
</div>


</body>
</html>
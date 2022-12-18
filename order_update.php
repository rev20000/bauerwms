<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['order_update'])){

   $date_issued = $_POST['date_issued'];
   $supplier_name = $_POST['supplier_name'];
   $date_delivery = $_POST['date_delivery'];
   $product_name = $_POST['product_name'];
   $product_quantity = $_POST['product_quantity'];
   $order_status = $_POST['order_status'];

   if(empty($date_issued) || empty($supplier_name) || empty( $date_delivery) || empty($product_name) || empty($product_quantity) || empty($order_status)){
      $message[] = 'please fill out all';
   }else{
      $update_data = "UPDATE orders SET name='$supplier_name', prodname='$product_name', prodquan='$product_quantity', orderstat='$order_status', dateiss='$date_issued', datedel='$date_delivery' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:orders.php');
      }else{
       $$message[] = 'please fill out all!'; 
      }
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="style2.css">
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


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM orders WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
<form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update</h3>
      <h1>Supplier Name:</h1><input type="text" class="box" name="supplier_name" value="<?php echo $row['name']; ?>" placeholder="Enter Supplier Name">
      <h1>Product Name:</h1><input type="text" class="box" name="product_name" value="<?php echo $row['prodname']; ?>" placeholder="Enter Supplier Name">
      <h1>Total Item:</h1><input type="text" class="box" name="product_quantity" value="<?php echo $row['prodquan']; ?>" placeholder="Enter Supplier Name">
     <h1>Order Status:</h1><select name="order_status" class="box">
         <option value="Approved">Approved</option>
         <option value="Pending">Pending</option>
         </select>
      <h1>Date Issued:</h1><input type="date" min="0" class="box" name="date_issued" value="<?php echo $row['dateiss']; ?>">
      <h1>Date Delivery:</h1><input type="date" min="0" class="box" name="date_delivery" value="<?php echo $row['datedel']; ?>">
      <input type="submit" value="update" name="order_update" class="btn">
      <a href="orders.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
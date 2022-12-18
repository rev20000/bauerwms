<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['supp_update'])){

   $supplier_name = $_POST['supplier_name'];
   $supplier_contact = $_POST['supplier_contact'];
   $supplier_email = $_POST['supplier_email'];
   $supplier_address = $_POST['supplier_address'];

   if(empty($supplier_name) || empty($supplier_contact) || empty($supplier_email) || empty($supplier_address)){
      $message[] = 'please fill out all';
   }else{
      $update_data = "UPDATE suppliers SET name='$supplier_name', contact='$supplier_contact',email='$supplier_email',address='$supplier_address' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:supplier.php');
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
      
      $select = mysqli_query($conn, "SELECT * FROM suppliers WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
<form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">Update</h3>
      <input type="text" class="box" name="supplier_name" value="<?php echo $row['name']; ?>" placeholder="Enter Supplier Name">
      <input type="number" class="box" name="supplier_contact" value="<?php echo $row['contact']; ?>" placeholder="Enter Supplier Contact">
      <input type="text" min="0" class="box" name="supplier_email" value="<?php echo $row['email']; ?>" placeholder="Enter Supplier Email">
      <input type="text" min="0" class="box" name="supplier_address" value="<?php echo $row['address']; ?>" placeholder="Enter Supplier Address">
      <input type="submit" value="update" name="supp_update" class="btn">
      <a href="supplier.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
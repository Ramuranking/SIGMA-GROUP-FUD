
<head>
  
  <link rel="stylesheet" href="style/edit.css">

</head>

<?php
if(isset($_GET['edit'])){

  $edit_id =$_GET['edit'];
}
$select="select * from sigmaorder where id='$edit_id'";
$run = mysqli_query($con,$select);

$row=mysqli_fetch_array($run);

  $food_id = $row['id'];
  $food_name = $row['food'];
  $food_quantity = $row['quantity'];
  $food_price= $row['price'];
?>

</br>
<div class="form">
  <h3>EDIT ORDER</h3>
  <br>
<form method="post" action="" align="center">

<input type="text"  name="u_food" value="<?php echo $food_name?>"/> </br><br>
<input type="text"  name="u_quantity"value="<?php echo $food_quantity?>"/> </br><br>
<input type="text"  name="u_price"value="<?php echo $food_price?>"/> </br><br>
<input type="submit"  name="update" value="Update Order"/><br>
</form>
</div>
<?php
if(isset($_POST['update'])){

   $update_food = $_POST['u_food'];
   $update_quantity = $_POST['u_quantity'];
   $update_price =$_POST['u_price'];
   
  $update = "update sigmaorder set food='$update_food', quantity='$update_quantity', price='$update_price' where id='$edit_id'";

$update_run = mysqli_query($con,$update);

if($update_run){
  
    echo "<script>alert('Order has been updated')</script>";
    echo "<script>windowns.open('place_oder.php','_self')</script>";



}}
?>
<!Doctype html>
<?php
$con = mysqli_connect("localhost","root","","sigma") or die("connection was not created");
?> 
<html>
<head>
<title></title>

 <link rel="stylesheet" href="style/edit.css">


</head>
<body>
 <div class="form">
  <h3>PLACE ORDER</h3>
  <br>
<form class="" method="post" action="place_oder.php" align="center">
<input type="text"  name="food" placeholder="Enter Food Name"/> </br><br>
<input type="text"  name="quantity" placeholder="Enter Food Quantity"/> </br><br>
<input type="text"  name="price" placeholder="Enter Food Price"/> </br><br>
<input type="submit"  name="sub" value="Sbmit Order"/>
</form>
</div>

<?php
if(isset($_POST['sub'])){

   $food = $_POST['food'];
   $quantity = $_POST['quantity'];
   $price = $_POST['price'];
  $insert = "insert into sigmaorder(food,quantity,price) values('$food','$quantity','$price')";

$run = mysqli_query($con,$insert);

if($run){
  echo"<h2>Order Sucessful</h2>";



}}
?>
</br>
<div class="sample">
<table width="800"border="1" align="center">
  <tr>
    <th colspan="8">ORDER STATEMENT</th>
  </tr>
<tr>

<th>S.N</th>
<th>Food</th>
<th>Quantity</th>
<th>Price</th>
<th>Date
</th>
<th>Edit</th>
<th>Remove</th>
</tr>

<?php
$select="select * from sigmaorder order by 1 DESC";
$run = mysqli_query($con,$select);
$i=0;
while($row=mysqli_fetch_array($run)){

  $food_id = $row['id'];
  $food_name = $row['food'];
  $food_quantity= $row['quantity'];
  $food_price = $row['price'];
  
  $i++;
?>
<div class="tdata">
<tr align="center">
<td><?php echo $i;?></td>
<td><?php echo $food_name;?></td>
<td><?php echo $food_quantity;?></td>
<td><?php echo $food_price;?></td>
<td><?php echo date("F d, Y")
?>
  
</td>
<td><a href = "place_oder.php?edit=<?php echo $food_id; ?>">Edit</a></td>
<td class="remove"><a href="place_oder.php?delete=<?php echo $food_id;?>">Remove</a></td>
</tr>
</div>
<?php } ?>
</table>
  
 
<br>
<br>
<br>

<?php 
if(isset($_GET['edit'])){
  
include("editoder.php");}
 ?>
<?php
if(isset($_GET['delete'])){
  $delete_id = $_GET['delete'];
  $delete = "delete from sigmaorder where id = '$delete_id'";
$run_delete = mysqli_query($con,$delete);
  if($run_delete){

    echo "<script>alert('Ieam has been Remove')</script>";
    echo "<script>windowns.open('place_oder.php','_self')</script>";
  }
}
?>

</body>
</html>
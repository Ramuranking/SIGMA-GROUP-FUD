<?php
include('dbconnection.php');

$query="SELECT
         `s`. `id`,
         `s`.`Email`,
         `s`.`phone`,
         `s`.`message`,
      FROM
        (
          `mydb`.`sales` `s`
          JOIN `mydb`.`food` `f`
       )
     WHERE (`s`.`sales` = `f`.`id`)
     ORDER BY `s`.`message`";
$statement=$db->prepare($query);
$statement->execute();
$students = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<head>
<title>sales App</title>
</head>
<body>
  <!-- <p><?php var_dump($students); ?></p> -->
  <h1>Food Order Records</h1>
  <table border="1" cellspacing="0" cellpadding="2">
    <tr>
      <th>Email</th>
      <th>Phone</th>
      <th>message</th>
      <th colspan="2">Actions</th>
    </tr>
    <?php foreach($sales as $sales): ?>
    <tr>
       <td><?php echo $sales['Email']; ?></td>
       <td><?php echo $sales['Phone']; ?></td>
       <td><?php echo $sales['message']; ?></td>
       <td>
          <form method="POST" action="delete_sales.php">
             <input type="hidden" name="action" value="delete">
             <input type="hidden" name="id" value="<?php echo $sales['id']; ?>">
             <input type="hidden" name="message" value="<?php echo $sales['message']; ?>">
             <input type="submit" value="Delete" name="submit">
          </form>
       </td>
       <td><a href="edit_form.php?id=<?php echo $sales['id']; ?>">Edit</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p><a href="SIGMA FORM.php">Order for new stuff</a></p>
</body>
</html>
<?php
require_once 'connectiondb.php';

// Get all departments by name
$query = 'SELECT * FROM department';
$statement=$db->prepare($query);
$statement->execute();
$departments=$statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
</head>
<body>
    <h1>Add New Student</h1>
    <form action="add_student.php" method="POST">
      
      <label for="name">Name:</label>
      <input type="text" name="name"><br>
    
       <label for="email">Email</label>
       <input type="text" name="Email"><br>

      <label for="phone">Phone</label>
      <input type="text" name="phone">

      <label for="message">message</label>
      <input type="text" name="message">
        <?php foreach($departments as $dept): ?>
        <option value="<?php echo $dept['id']; ?>">
            <?php echo $dept['name']; ?>
        </option>
         <?php endforeach; ?>
      </select><br>

      <label for="submit">&nbsp;</label>
      <input type="submit" name="submit" value="Add">
    </form>
</body>
</html>

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
      <label for="firstname">First Name:</label>
      <input type="text" name="firstname"><br>

      <label for="surname">Last Name:</label>
      <input type="text" name="surname"><br>

       <label for="gender">Gender</label>
       <input type="radio" name="gender" value="male">Male &nbsp;
       <input type="radio" name="gender" value="female">Female<br>
    
       <label for="dob">Birth date:</label>
       <input type="date" name="dob"><br>

      <label for="dept">Department</label>
      <select name="dept">
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

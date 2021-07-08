<?php
if(isset($_POST['submit'])){
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $txtEmail = filter_input(INPUT_POST, 'txtEmail', FILTER_VALIDATE_INT);
    $txtphone = filter_input(INPUT_POST, 'txtPhone', FILTER_VALIDATE_INT);
    
   if($id === false || $id === NULL || $txtEmail === NULL || $txtEmail === false || $txtPhone ==false || $txtPhone == NULL) {
       echo 'Invalid stud_id or dept_id';
       exit();
   } else {
       require_once('dbconnection.php');

       $query = 'DELETE FROM formcontact WHERE id =:id AND txtEmail =:txtEmai AND txtPhone =:txtphone';
       $statement=$db->prepare($query);
       $statement->bindValue(':id', $id);
       $statement->bindValue(':txtEmail', $txtEmail);
       $statement->bindValue(':txtPhone', $txtphone);
       $statement->execute();
       $statement->closeCursor();
       header('Location: index.php');
   }
}

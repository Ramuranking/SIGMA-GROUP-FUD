<?php
    require_once 'dbconnection.php';

    // Get all departments by name
    $query = 'SELECT * FROM formcontact';
    $statement=$db->prepare($query);
    $statement->execute();
    $departments=$statement->fetchAll();
    $statement->closeCursor();

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $txtEmail = filter_input(INPUT_GET, 'txtEmail', FILTER_VALIDATE_INT);
    $txtPhone = filter_input(INPUT_GET, 'txtPhone', FILTER_VALIDATE_INT);
    if($id == NULL || $id == false || $dept == NULL || $dept == false) {
        echo 'Invalid txtEmail or id or txtPhone';
        exit();
    }

    // Get contact with the given id
    $query="SELECT
                `id`,
                `Email`,
                `Phone`,
                `Message`
            FROM `formcontact`
            WHERE id = :id";
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $student=$statement->fetch();
    $statement->closeCursor();

?>

<?php
    require_once("../utils/connect.php");

    $sql = "DELETE FROM messages";
    $query = $db->prepare($sql);
    $query->execute();


    header('Location: ../index.php');

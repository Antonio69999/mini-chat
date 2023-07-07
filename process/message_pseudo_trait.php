<?php

require_once('../utils/connect.php');
require_once('../style/RandomColor.php');
use \Colors\RandomColor;


if ($_SERVER['REQUEST_METHOD'] === 'POST') { //check si le formulaire est soumis avec la methode POST
    $pseudo = $_POST['pseudo'];              //recupere la veleur du champà l'aide de $_POST['pseudo']
    //et la stock dans la var $pseudo
    $color = RandomColor::one();
    // Check if the user already exists via a SELECT request
    $selectUserSql = "SELECT id_user FROM users WHERE pseudo = :pseudo";
    $selectUserQuery = $db->prepare($selectUserSql);
    $selectUserQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $selectUserQuery->execute();
    $user = $selectUserQuery->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $idUser = $user['id_user'];
    } else {
        // User does not exist, insert a new record
        $insertUserSql = "INSERT INTO users (pseudo, color) VALUES (:pseudo, :color)";     //si l'utilisateur n'exist pas une nouvelle ligne est inséré dans la tabke 'users'
        $insertUserQuery = $db->prepare($insertUserSql);
        $insertUserQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $insertUserQuery->bindValue(':color', $color, PDO::PARAM_STR);
        $insertUserQuery->execute();
        $idUser = $db->lastInsertId();
    }

    $datehour = $_POST['datehour'];
    $textmessage = $_POST['textmessage'];

    // Insert the message into the messages table
    $insertMessageSql = "INSERT INTO messages (id_user, datehour, textmessage) 
                         VALUES (:id_user, :datehour, :textmessage)";
    $insertMessageQuery = $db->prepare($insertMessageSql);
    $insertMessageQuery->bindValue(':id_user', $idUser, PDO::PARAM_INT);
    $insertMessageQuery->bindValue(':datehour', date('Y-m-d-H:i:s') . ' ' . $datehour, PDO::PARAM_STR);
    $insertMessageQuery->bindValue(':textmessage', $textmessage, PDO::PARAM_STR);
    $insertMessageQuery->execute();

    header('Location: ../index.php');
}

<?php

require_once('../utils/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pseudo = $_POST['pseudo'];


    $sql = "INSERT INTO users (pseudo) VALUES (:pseudo);";

    $query = $db->prepare($sql);

    $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

    $query->execute();
    header('Location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = date('H:i:s');
    $datehour = $_POST['datehour'];
    $textmessage = $_POST['textmessage'];
    $idUser = "SELECT id_user FROM users";

    // Récupérer l'id_user depuis la table users
    $selectSql = "SELECT id_user FROM users WHERE pseudo = :pseudo";
    $selectQuery = $db->prepare($selectSql);
    $selectQuery->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $selectQuery->execute();
    $user = $selectQuery->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $idUser = $user['id_user'];

        // Insérer le message dans la table messages
        $insertSql = "INSERT INTO messages (id_user, datehour, textmessage) VALUES (:id_user, :datehour, :textmessage)";
        $insertQuery = $db->prepare($insertSql);
        $insertQuery->bindValue(':id_user', $idUser, PDO::PARAM_INT);
        $insertQuery->bindValue(':datehour', date('Y-m-d-H:i:s') . ' ' . $datehour, PDO::PARAM_STR);
        $insertQuery->bindValue(':textmessage', $textmessage, PDO::PARAM_STR);
        $insertQuery->execute();

        header('Location: ../index.php');
    } 
}
?>
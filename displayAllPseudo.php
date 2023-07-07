<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display_pseudo</title>
</head>
<body>
    <h4>Liste des Utilisateur connectés : </h4>
<?php require_once ('./utils/connect.php');?>

<div>

<?php
$request = $db->query('SELECT * FROM users');
$users = $request->fetchAll();

foreach ($users as $user) {
    echo "User n°".$user['id_user']." : ".$user['pseudo'];
    echo ('<br>');
}

?>
</div>

</body>
</html>
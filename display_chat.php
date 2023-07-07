<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once ('./utils/connect.php');

$request = $db->query('SELECT pseudo, color, datehour, textmessage FROM messages INNER JOIN users ON messages.id_user = users.id_user');
while ($i=$request->fetch())
{
    echo '<p style="color:'.$i['color'].';">'.$i['pseudo'].' '.$i['datehour'].' '.$i['textmessage'].'</p>';
}

?>
    
</body>
</html>
<?php

$request = $db->query('SELECT * FROM users, messages');

// Fetching the results as an associative array:
while ($row = $request->fetch()) {
    // Displaying the pseudo, date, and message of the current record:
    echo $row['pseudo'] . ' ' . $row['datehour'] . ' ' . $row['textmessage'] . '<br>';
}
?>
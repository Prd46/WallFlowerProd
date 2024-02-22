<?php

include_once __DIR__ . '/../connection.php';

if (!$_POST) {
    die('Unauthorized action');
}


// defining values in the edit
$emojiPath_value = sanitize_value($_POST['emojiPath']);
$title_value = sanitize_value($_POST['title']);
$entryText_value = sanitize_value($_POST['entryText']);
$id_value = sanitize_value($_POST['id']);

// edits the database value for each item
$query = "UPDATE JournalEntries SET emojiPath = '{$emojiPath_value}', title = '{$title_value}', entryText = '{$entryText_value}' WHERE id = {$id_value}";

// Run the SQL statement
$result = mysqli_query($db_connection, $query);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/journal.php');
} else {
    $error_message = 'Sorry there was an error creating the recipe';
    echo $error_message;
}

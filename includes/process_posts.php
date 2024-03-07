<?php

include_once __DIR__ . '/../connection.php';

if (!$_POST) {
    die('Unauthorized action');
}

// Store $_POST data to variables for readability
$title = sanitize_value($_POST['title']);
$entryText = sanitize_value($_POST['entryText']);

$result = add_journal($user_data['user_id'], $title, $entryText);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/journal.php');
} else {
    $error_message = 'Sorry there was an error creating your journal: ' . mysqli_error($db_connection);
    echo $error_message;
}
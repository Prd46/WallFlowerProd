<?php

include_once __DIR__ . '/../connection.php';

if (!$_POST) {
    die('Unauthorized action');
}


// defining values in the edit
$title_value = sanitize_value($_POST['title']);
$entryText_value = sanitize_value($_POST['entryText']);
$id_value = sanitize_value($_POST['id']);

$now = sanitize_value(date('Y-m-d H:i:s'));


global $crypkey;
$cipher = "AES-128-CTR";
$iv = "1234567890123456";
$key = "$crypkey";
$titleEncryption =  openssl_encrypt($title_value, $cipher, $crypkey,$options=0,$iv);
$entryEncryption =  openssl_encrypt($entryText_value, $cipher, $crypkey,$options=0,$iv);

// edits the database value for each item
$query = "UPDATE JournalEntries SET title = '{$titleEncryption}', entryText = '{$entryEncryption}' WHERE id = {$id_value}";

// Run the SQL statement
$result = mysqli_query($db_connection, $query);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/journal.php');
} else {
    $error_message = 'Sorry there was an error creating the recipe';
    echo $error_message;
}

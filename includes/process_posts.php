<?php

include_once __DIR__ . '/../connection.php';

if (!$_POST) {
    die('Unauthorized action');
}

// Store $_POST data to variables for readability
$title = sanitize_value($_POST['title']);
$entryText = sanitize_value($_POST['entryText']);

global $crypkey;
$cipher = "AES-128-CTR";
$iv = "1234567890123456";
$titleEncryption =  openssl_encrypt($title, $cipher, $crypkey,$options=0,$iv);
$entryEncryption =  openssl_encrypt($entryText, $cipher, $crypkey,$options=0,$iv);
// $encryptedTitle = password_hash("$title", PASSWORD_DEFAULT);
// $encryptedTitle = password_hash("$title", PASSWORD_DEFAULT);

$result = add_journal($user['user_id'], $titleEncryption, $entryEncryption);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/journal.php');
} else {
    $error_message = 'Sorry there was an error creating your journal: ' . mysqli_error($db_connection);
    echo $error_message;
}
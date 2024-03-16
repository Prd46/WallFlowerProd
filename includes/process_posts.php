<?php

include_once __DIR__ . '/../connection.php';

if (!$_POST) {
    die('Unauthorized action');
}

// Store $_POST data to variables for readability
$t = sanitize_value($_POST['title']);
$et = sanitize_value($_POST['entryText']);

$title = stripslashes($t);
$entryText = stripslashes($et);

global $crypkey;
global $cipher;
global $iv;
$titleEncryption =  openssl_encrypt($title, $cipher, $crypkey,$options=0,$iv);
$entryEncryption =  openssl_encrypt($entryText, $cipher, $crypkey,$options=0,$iv);
// echo openssl_decrypt($titleEncryption, $cipher, $crypkey,$options=0,$iv);
// echo openssl_decrypt($entryEncryption, $cipher, $crypkey,$options=0,$iv);
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
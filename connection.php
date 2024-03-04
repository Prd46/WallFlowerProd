<?php
/**
 * This file is used store all the business
 * logic for the application.
 */

// An array of values that will determine if you're working locally or on a production server.
// @link https://stackoverflow.com/questions/2053245/how-can-i-detect-if-the-user-is-on-localhost-in-php
$whitelist_host = ['127.0.0.1', '::1'];
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist_host)) {
    // You are in the Local environment. Pull in the correct .env file.
    if (file_exists(__DIR__ . '/.env.local.php')) {
        include_once __DIR__ . '/.env.local.php';
    } else {
        die('Missing: .env.local.php file');
    }
} else {
    // You are in the Production environment. Pull in the correct .env file.
    if (file_exists(__DIR__ . '/.env.production.php')) {
        // holds global variables for the entire application
        include_once __DIR__ . '/.env.production.php';
    } else {
        // if the file does not exist, throw an error
        die('Missing: .env.production.php file');
    }
}
// Include the database connection. Order matters and should always be first
include_once __DIR__ . '/includes/databaseVars.php';

$time = time();

$cookie_name = "user_id";
$cookie_value = "";

if(!isset($_COOKIE[$cookie_name])) {
    // echo "Cookie named '" . $cookie_name . "' is not set!";
    $cookie_value = "{$time}";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    
} else {
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    // echo "Value is: " . $_COOKIE[$cookie_name];
    $cookie_value = $_COOKIE[$cookie_name];
    
}


$sql = "SELECT * FROM users WHERE user_id = '$cookie_value'";
$result = $db_connection->query($sql);

if ($result->num_rows == 0) {
    // If the user doesn't exist, insert a new record into the database
    $sql_insert = "INSERT INTO users (user_id) VALUES ('$cookie_value')";
    if ($db_connection->query($sql_insert) === TRUE) {
        // echo "New record created successfully";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $db_connection->error;
    }
} else {
    // If the user exists, you can retrieve their information from the database
    // For example:
    $user_data = $result->fetch_assoc();
    // echo "Welcome back, " . $user_data['username'];
    //$user_data['user_id'];
    //$user_data['item_category'];
    //$user_data['item_id'];
    //$user_data['saved_status'];
}


//CREATE COOKIE LOGIC TO STORE THE USER INFO. 
//CHECK FOR COOKIE, IF NOT, CREATE USER ID COOKIE. 



include_once __DIR__ . '/includes/functions.php';
include_once __DIR__ . '/includes/posts_SQL.php';
// Credentials for the database connection coming from our .env file


?>
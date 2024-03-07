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
include_once __DIR__ . '/includes/functions.php';

// Create a default user in case a new one can be created
global $db_connection;
$checkForDefault = "SELECT * FROM users WHERE user_id = 1"; //Check to see if the default user is there (as a backup)
$OGUserCheck = mysqli_query($db_connection, $checkForDefault);
$user_data;
if ($OGUserCheck->num_rows == 0) { // Works, creates a default user with user_id 1. 
    $query = 'INSERT INTO users';
    $query .= ' (user_id, item_id, saved_status)';
    $query .= " VALUES ('1', '0', '0')";
    $createDefaultUser = mysqli_query($db_connection, $query);
    // echo "Default user created";
    
}

$OGUserCheck = mysqli_query($db_connection, $checkForDefault);
$user_data = $OGUserCheck->fetch_assoc(); //Set a default value for the user data as the original result
// echo $user_data['user_id'];

// Define cookie variables
$site_url = site_url();
$idGenerate = rand(111111111,999999999);
$cookie_name = "user_id";
$cookie_value = "{$user_data['user_id']}";
echo $cookie_value;
$save_enabled = 1;

// Attempt to create cookie
if(!isset($_COOKIE[$cookie_name])) {//If there is no cookie set, set one
    // echo "Cookie named '" . $cookie_name . "' is not set!";
    $cookie_value = "{$idGenerate}"; //Set the value of the cookie to a random number
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
    echo "Adding new value: " . $_COOKIE[$cookie_name]; //THIS DOES NOT APPEAR ON INITIAL REFRESH after the cookie is made, on local. 

} else { //If there is already a cookie, set the cookie value variable equal to the value of the user_id cookie. 
    // echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
    $cookie_value = $_COOKIE[$cookie_name];
}

if(!isset($_COOKIE[$cookie_name])) {//THIS WILL ALWAYS RUN AFTER IMMEDIATELY CLEARING COOKIES.
    // echo "Cookie not created";
    // die;
    $save_enabled = 0; //The set cookie function doesn't work until AFTER reload, so it disables functionality requiring cookies.
}



$sql = "SELECT * FROM users WHERE user_id = '$cookie_value'"; //Check database to get the row made by the cookie
$result = $db_connection->query($sql);


if (!$result) {
    // Log database query error
    error_log("Database query error: " . $db_connection->error);
} else {
    if($save_enabled == 1) {
        if ($result->num_rows == 0) {
            // If the user doesn't exist, insert a new record into the database
            $sql_insert = "INSERT INTO users (user_id, item_id, saved_status) VALUES ('$cookie_value', '0', '0')"; //If there isn't one with cookie as User ID, add one.
            $fetch = mysqli_query($db_connection, $sql_insert); //The database row acts as our "user"
            if (!$fetch) {
                error_log("Insert query error: " . $db_connection->error);
            }
            // TODO: how to get most recent row after insert
            $sql2 = "SELECT * FROM users ORDER BY id ASC"; // Get the newest database entry. 
            $recencyCheck = mysqli_query($db_connection, $sql2);
            $user_data = $recencyCheck->fetch_assoc(); // User data comes from that newest cookie. 
            echo $user_data['user_id'];
        } else {
            // If the user exists, you can retrieve their information from the database
            // For example:
            $user_data = $result->fetch_assoc(); 
            echo $user_data['user_id'];
            // echo "Welcome back, " . $user_data['username'];
        }
    }
}

//CREATE COOKIE LOGIC TO STORE THE USER INFO. 
//CHECK FOR COOKIE, IF NOT, CREATE USER ID COOKIE. 


include_once __DIR__ . '/includes/posts_SQL.php';
// Credentials for the database connection coming from our .env file


?>
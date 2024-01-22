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
include_once __DIR__ . '/includes/posts_SQL.php';
// Credentials for the database connection coming from our .env file
?>
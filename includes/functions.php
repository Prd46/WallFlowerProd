

<?php
/**
 * This file will hold all the functions for your project.
 */

function get_project_path()
{
    global $APP_CONFIG;
    if ($APP_CONFIG['environment'] === 'development') {
        return $_SERVER['DOCUMENT_ROOT'] . '/idm232/final';
    } else {
        return $_SERVER['DOCUMENT_ROOT'] . '/final';
    }
}

/**
 * Get the site URL defined in your .env file
 * @return string - The site URL | example: http://localhost:8888/final
 */
function site_url()
{
    global $APP_CONFIG;
    return $APP_CONFIG['site_url'];
}

/**
 * Get current project root directory path
 * @return string - The path to the project root directory
 */
function project_root()
{
    return dirname(__FILE__);
}

/**
 * return date and time in the correct
 * mysqi 'datetime' format
 *
 * @return string
 */
function getFormattedDateTime() //give formatted date for footer
{
    return  date('Y-m-d H:i:s');
}

function sanitize_value($value) //prevent malicious inputs
{
    global $db_connection;
    return mysqli_real_escape_string($db_connection, $value);
}

function redirect_to($path) //redirect
{
    $full_url = site_url() . $path;
    echo "<script>window.location = '$full_url';</script>";
    exit;
}
<?php
global $db_connection;
global $site_url;

function getDefaultUser() { //Unused, but creates a default user to reference to if you cannot make a cookie based one
    global $db_connection;
    $checkForDefault = "SELECT * FROM users WHERE user_id = 1"; //Check to see if the default user is there (as a backup)
    $OGUserCheck = mysqli_query($db_connection, $checkForDefault);
    if ($OGUserCheck->num_rows == 0) { // Works, creates a default user with user_id 1. 
        $query = 'INSERT INTO users';
        $query .= ' (user_id, item_id, saved_status)';
        $query .= " VALUES ('1', '0', '0')";
        $createDefaultUser = mysqli_query($db_connection, $query);        
    }
    
    $OGUserCheck = mysqli_query($db_connection, $checkForDefault);
    $user_data = $OGUserCheck->fetch_assoc(); //Set a default value for the user data as the original r
    return $user_data;
}

function generateUserId() {
    $idGenerate = rand(111111111,999999999);
}

function createCookie($uid) {//Make a cookie for the user
    global $site_url;
    $cookie_name = "user_id";
    $expire_date = time() + (86400 * 30);
    setcookie($cookie_name, $uid, $expire_date, "/", ".pauldigerolamo.com", 1); // 86400 = 1 day
}

function createUser($user_id) {
    global $db_connection;
    $sql = "SELECT * FROM users WHERE user_id = '$user_id'"; //Check database to get the row made by the cookie
    $result = $db_connection->query($sql);

    if (!$result) {
        // Log database query error
        error_log("Database query error: " . $db_connection->error);
        return null;
    } else {
        $sql_insert = "INSERT INTO users (user_id, item_id, saved_status) VALUES ('$user_id', '0', '0')"; //If there isn't one with cookie as User ID, add one.
        $fetch = mysqli_query($db_connection, $sql_insert); 

        if ($fetch) {
            $last_id = mysqli_insert_id($db_connection);
            $sql_select = "SELECT * FROM users WHERE id = $last_id"; 
            $result = mysqli_query($db_connection, $sql_select);
            return $result->fetch_assoc(); 
        } else {
            error_log("Insert query error: " . $db_connection->error);
            return null;
        }
        
        // // TODO: how to get most recent row after insert
        // $sql2 = "SELECT * FROM users ORDER BY id ASC"; // Get the newest database entry. 
        // $recencyCheck = mysqli_query($db_connection, $sql2);
        // $user_data = $recencyCheck->fetch_assoc(); // User data comes from that newest cookie. 
        // echo $user_data['user_id'];
        // if ($result->num_rows > 0) {
        //     $user_data = $result->fetch_assoc(); 
        //     echo $user_data['user_id'];
        //     echo "Welcome back, " . $user_data['username'];
        // }
        // if($save_enabled == 1) {
        //     if ($result->num_rows == 0) {
        //         // If the user doesn't exist, insert a new record into the database
        //         $sql_insert = "INSERT INTO users (user_id, item_id, saved_status) VALUES ('$cookie_value', '0', '0')"; //If there isn't one with cookie as User ID, add one.
        //         $fetch = mysqli_query($db_connection, $sql_insert); //The database row acts as our "user"
        //         if (!$fetch) {
        //             error_log("Insert query error: " . $db_connection->error);
        //         }
        //         // TODO: how to get most recent row after insert
        //         $sql2 = "SELECT * FROM users ORDER BY id ASC"; // Get the newest database entry. 
        //         $recencyCheck = mysqli_query($db_connection, $sql2);
        //         $user_data = $recencyCheck->fetch_assoc(); // User data comes from that newest cookie. 
        //         echo $user_data['user_id'];
        //     } else {
        //         // If the user exists, you can retrieve their information from the database
        //         // For example:
        //         $user_data = $result->fetch_assoc(); 
        //         echo $user_data['user_id'];
        //         // echo "Welcome back, " . $user_data['username'];
        //     }
        // }
    }
}

function getUserById($user_id) {
    global $db_connection;
    $sql = "SELECT * FROM users WHERE user_id = '$user_id' LIMIT 1";  
    $result = mysqli_query($db_connection, $sql);
 
    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        return $user_data;
    } else {
        return createUser($user_id);
    }
}

$cookie_name = "user_id";

// WRITE OUT PAGE FUNCTIONS LIKE THIS.
// WRITE IN COMMENTS WHAT YOU WANT TO BE ABLE TO DO, THEN MAKE FUNCTIONS UP ABOVE AND CALL THEM DOWN HERE. 
if(!isset($_COOKIE[$cookie_name])) {//If there is no cookie set, set one
    $user_id = uniqid();
    createCookie($user_id);
    setcookie('$cookie_name', '$uid', time() + (86400 * 30), "/", ".pauldigerolamo.com"); // 86400 = 1 day

    $user = createUser($user_id);
    // $save_enabled = 0; //The set cookie function doesn't work until AFTER reload, so it disables functionality requiring cookies.
} else { 
    $user = getUserById($_COOKIE[$cookie_name]);
    // $save_enabled = 1;
}
?>
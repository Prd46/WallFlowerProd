<?php
include_once __DIR__ . '/../connection.php';
$id = $_POST['id'];
$dbName = $_POST['dbName'];
$redirect = $_POST['redirect'];
$newRow = "FALSE";
if (($dbName == "Affirmations") ||($dbName == "ConversationStarters")){
    $colName = $_POST['colName'];
    if (isset($_POST['toggle'])) {
        $query = "SELECT * FROM {$dbName} WHERE id = '{$id}'" ;
        // echo $query;
        $site_url = site_url();
        $features = mysqli_query($db_connection, $query);
        $row = mysqli_fetch_assoc($features);
        if (mysqli_num_rows($features) > 0){
            $current_value = $row[$colName];
            // Toggle the value
            if ($current_value == false){
                // $litClassToggle = "saveLit";
                $updateSql = "UPDATE {$dbName} SET {$colName} = TRUE WHERE id = {$row['id']}";
                $litClassToggle3 = "1";
                $litClassToggle = "0";
                $litClassToggle2 = "1";
                mysqli_query($db_connection, $updateSql);
            }else{
                $litClassToggle4 = "1";
                $litClassToggle = "1";
                $litClassToggle2 = "0";
                // $litClassToggle = "saveUnlit";
                $updateSql = "UPDATE {$dbName} SET {$colName} = FALSE WHERE id = {$row['id']}";
                mysqli_query($db_connection, $updateSql);

            }

            
            // if ($current_value == false){
                
            // }else{
             
            // }
        }

    
    }
}else{



                if (!$dbName){
                    echo "No database name set";
                    die;
                }
                // echo $colName;

                $litClassToggle = "1";
                $litClassToggle2 = "0";
                // $litClassToggle3 = "0";
                // $litClassToggle4 = "0";
                // Handle button click
                if (isset($_POST['toggle'])) {
                    $query = "SELECT * FROM users WHERE item_id = '{$id}' AND item_category = '{$dbName}' AND user_id = '{$user['user_id']}'" ;
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);

                    if (!$row){
                            $query2 = 'INSERT INTO users';
                            $query2 .= ' (user_id, item_category, item_id, saved_status)';
                            $query2 .= " VALUES ('{$user['user_id']}', '$dbName', '$id', TRUE)";
                            $result = mysqli_query($db_connection, $query2);
                            if ($result){
                                $newRow = 'TRUE';
                            }
                            // return $result;
                    }


                    // Fetch the current 'saved' value from the database
                    if (mysqli_num_rows($features) > 0){

                        //Change saved_status based on its value if found.
                        //If not, create a new entry in the Users table and set the saved status to 1. 


                        $current_value = $row["saved_status"];


                        // Toggle the value
                        if ($current_value == false){
                            // $litClassToggle = "saveLit";
                            $updateSql = "UPDATE users SET saved_status = TRUE WHERE id = {$row['id']}";
                            $litClassToggle3 = "1";
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                            mysqli_query($db_connection, $updateSql);
                        }else{
                            $litClassToggle4 = "1";
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                            // $litClassToggle = "saveUnlit";
                            $updateSql = "UPDATE users SET saved_status = FALSE WHERE id = {$row['id']}";
                            mysqli_query($db_connection, $updateSql);
                        }
                        // echo "peepee";
                        
                        // if ($current_value == false){
                            
                        // }else{
                         
                        // }
                    }
 
                
                } 
            }
                if (($row) || ($newRow)) {
                    redirect_to("{$redirect}");
                } else {
                    $error_message = 'Sorry there was an error saving the item: ' . mysqli_error($db_connection);
                    echo $error_message;
                }

                ?>
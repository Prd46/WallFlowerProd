<?php
include_once __DIR__ . '/../connection.php';
$id = $_POST['id'];
$dbName = $_POST['dbName'];
$colName = $_POST['colName'];
$redirect = $_POST['redirect'];

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
                    $query = 'SELECT *';
                    $query .= " FROM {$dbName}";
                    $query .= " WHERE id = {$id}";
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);


                    // Fetch the current 'saved' value from the database
                    if (mysqli_num_rows($features) > 0){




                        $current_value = $row["{$colName}"];


                        // Toggle the value
                        if ($current_value == false){
                            // $litClassToggle = "saveLit";
                            $updateSql = "UPDATE {$dbName} SET {$colName} = TRUE WHERE id = " . $row["id"];
                            $litClassToggle3 = "1";
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                            mysqli_query($db_connection, $updateSql);
                        }else{
                            $litClassToggle4 = "1";
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                            // $litClassToggle = "saveUnlit";
                            $updateSql = "UPDATE {$dbName} SET {$colName} = FALSE WHERE id = " . $row["id"];
                            mysqli_query($db_connection, $updateSql);
                        }

                        
                        // if ($current_value == false){
                            
                        // }else{
                         
                        // }
                    }
 
                
                }

                if ($row) {
                    redirect_to("{$redirect}");
                } else {
                    $error_message = 'Sorry there was an error saving the item: ' . mysqli_error($db_connection);
                    echo $error_message;
                }

                ?>
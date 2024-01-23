<?php include_once __DIR__ . '/connection.php';
?>

<?php
                /*SELECT QUESTION
                FROM Questions
                ORDER BY RAND()  
                LIMIT 1; */
                $query = 'SELECT *';
                $query .= ' FROM Affirmations';
                $query .= " WHERE affirmationSaved = TRUE";
                $query .= " ORDER BY RAND()";
                $query .= " LIMIT 5;";

                $affirmations = mysqli_query($db_connection, $query);
                if ($affirmations->num_rows == 0){
                  $affirmations = false;
                  }
                
                // $site_url = site_url();
                // echo $db_connection;
                // echo $query;
                $checkAllReadSql = "SELECT COUNT(*) AS total_rows FROM Affirmations WHERE affirmationRead = TRUE";
                $checkResult = mysqli_query($db_connection, $checkAllReadSql);
                $totalRows = mysqli_fetch_assoc($checkResult)["total_rows"];
                
                $features = mysqli_query($db_connection, $query);
                if (mysqli_num_rows($features) > 0) {
                    $row = mysqli_fetch_assoc($features);
                    $affirmationText = $row["affirmation"];

                    $updateSql = "UPDATE Affirmations SET affirmationRead = TRUE WHERE id = " . $row["id"];
                    mysqli_query($db_connection, $updateSql);
                } else {
                    $resetReadStatusSql = "UPDATE Affirmations SET affirmationRead = FALSE";
                    mysqli_query($db_connection, $resetReadStatusSql);
                    $row = mysqli_fetch_assoc($features);
                    $affirmationText = "I have value.";
                }
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Favorites</title>
</head>
<body>
    <header>
        <div class="header_image_box">
            <a href="index.html">
                <div class="header_backButton">
                    <img class="header_backButtonImage" src="~"/>
                </div>
            </a>
            <img class="header_image" src="~"/>
        </div>
    </header>
    <main>
        <div class="affirmations_main_label">
            <h1 class="affirmations_main_label_header">Affirmations</h1>
        </div>
        <div class="affirmations_main_content">
            
<?php
                  if (!$affirmations) {
                    echo '<p>No results found</p>';
                }

        if ($affirmations){
                    while ($affirmation = mysqli_fetch_array($affirmations)) {
                        echo "
                        <div class='saved_listing'>
                        <p class=''>{$affirmation['affirmation']}</p>
                        </div>";
                      } 
                }

?>
        </div>
    </main>
    <footer>
        <div class="footer_buttons">
            <a href="settings.html">
                <div class="footer_button">
                    <img class="icon" src="~"/>
                    <p class="footer_button_text">Settings</p>
                </div>
            </a>
            <a href="index.html">
                <div class="footer_button">
                    <img class="icon" src="~"/>
                    <p class="footer_button_text">Home</p>
                </div>
            </a>
            <a href="contact.html">
                <div class="footer_button">
                    <img class="icon" src="~"/>
                    <p class="footer_button_text">Contact</p>
                </div>
            </a>   
        </div>
    </footer>
</body>
</html>
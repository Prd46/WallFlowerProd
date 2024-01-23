<?php include_once __DIR__ . '/connection.php';
?>

<?php
                /*SELECT QUESTION
                FROM Questions
                ORDER BY RAND()  
                LIMIT 1; */
                $query = 'SELECT *';
                $query .= ' FROM ConversationStarters';
                $query .= " WHERE starterRead = FALSE";
                $query .= " ORDER BY RAND()";
                $query .= " LIMIT 1;";


                $site_url = site_url();
                // echo $db_connection;
                // echo $query;
                $checkAllReadSql = "SELECT COUNT(*) AS total_rows FROM ConversationStarters WHERE starterRead = TRUE";
                $checkResult = mysqli_query($db_connection, $checkAllReadSql);
                $totalRows = mysqli_fetch_assoc($checkResult)["total_rows"];
                
                $features = mysqli_query($db_connection, $query);
                if (mysqli_num_rows($features) > 0) {
                    $row = mysqli_fetch_assoc($features);
                    $convoText = $row["conversationStarter"];

                    $updateSql = "UPDATE ConversationStarters SET starterRead = TRUE WHERE id = " . $row["id"];
                    mysqli_query($db_connection, $updateSql);
                } else {
                    $resetReadStatusSql = "UPDATE ConversationStarters SET starterRead = FALSE";
                    mysqli_query($db_connection, $resetReadStatusSql);
                    $row = mysqli_fetch_assoc($features);
                    $convoText = "How was your day today?";
                }
                ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Conversation Starters</title>
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
            <h1 class="affirmations_main_label_header">Conversation Starters</h1>
        </div>
        <div class="affirmations_main_content">
            <h2 class="affirmations_main_content_affirmation">
                <?php echo $convoText; ?>
            </h2>
            <div class="affirmations_main_content_buttons">
                <a href="conversationStarters.php">
                    <div class="affirmations_main_content_button">
                        <img class="icon" src="~"/>
                        <p class="affirmations_main_content_button_label">Generate</p>
                    </div>
                </a>
                <div class="affirmations_main_content_button">
                    <img class="icon" src="~"/>
                    <p class="affirmations_main_content_button_label">Save</p>
                </div>
                <div class="affirmations_main_content_button">
                    <img class="icon" src="~"/>
                    <p class="affirmations_main_content_button_label">View Saved</p>
                </div>
            </div>
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
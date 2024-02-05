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

<?php 
  $page_name = 'Conversation Starters'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
    <main class="affirmations_main">
        <div class="affirmations_main_label">
            <h1 class="affirmations_main_label_header TL">Conversation Starters</h1>
        </div>
        <div class="affirmations_main_content FCJA">
            <h2 class="affirmations_main_content_affirmation TL C">
                <?php echo $convoText; ?>
            </h2>
            <div class="affirmations_main_content_buttons flex">
            <div class="affirmations_main_content_button save flex aicenter round">
                    <img class="icon" src="media/icons/affirmationsSave.svg"/>
                    <p class="affirmations_main_content_button_label LL">Save</p>
                </div>
                <a href="conversationStarters.php">
                    <div class="affirmations_main_content_button regenerate flex aicenter round">
                        <img class="icon" src="media/icons/regen.svg"/>
                        <p class="affirmations_main_content_button_label LL">Regenerate</p>
                    </div>
                </a>
            </div>
        </div>
    </main>

    
    <?php 
  include_once __DIR__ . '/components/footer.php'
?>
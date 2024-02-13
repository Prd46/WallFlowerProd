<?php include_once __DIR__ . '/connection.php';
?>












<?php
                $litClassToggle = "";
                $convoText = "How was your day today?";


                if (!$_POST) {
                    $query = 'SELECT *';
                    $query .= ' FROM ConversationStarters';
                    $query .= " WHERE starterRead = FALSE";
                    // $query .= " ORDER BY RAND()";
                    $query .= " LIMIT 1;";
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);


                    if (mysqli_num_rows($features) > 0) {





                        $current_value = $row['starterSaved'];
                        if ($current_value == false){
                            $litClassToggle = "saveUnlit";
                        }else{
                            $litClassToggle = "saveLit";
                        }

                        $updateSql = "UPDATE ConversationStarters SET starterRead = TRUE WHERE id = " . $row["id"];
                        mysqli_query($db_connection, $updateSql);
                        $convoText = $row["conversationStarter"];
                    } else {
                        $resetReadStatusSql = "UPDATE ConversationStarters SET starterRead = FALSE";
                        mysqli_query($db_connection, $resetReadStatusSql);

                        
                    }
         }




                // Handle button click
                if (isset($_POST['toggle'])) {

                    $query = 'SELECT *';
                    $query .= ' FROM ConversationStarters';
                    $query .= " WHERE starterRead = TRUE";
                    $query .= " ORDER BY id DESC";
                    $query .= " LIMIT 1;";
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);


                    // Fetch the current 'saved' value from the database
                    if (mysqli_num_rows($features) > 0){




                        $current_value = $row['starterSaved'];
                        
                        if ($current_value == false){
                            $litClassToggle = "saveLit";
                        }else{
                            $litClassToggle = "saveUnlit";
                        }

                        // Toggle the value
                        if ($current_value == false){
                            // $litClassToggle = "saveLit";
                            $updateSql = "UPDATE ConversationStarters SET starterSaved = TRUE WHERE id = " . $row["id"];

                            mysqli_query($db_connection, $updateSql);
                            $convoText = $row["conversationStarter"];
                        }else{
                            // $litClassToggle = "saveUnlit";
                            $updateSql = "UPDATE ConversationStarters SET starterSaved = FALSE WHERE id = " . $row["id"];
                            mysqli_query($db_connection, $updateSql);
                            $convoText = $row["conversationStarter"];
                        }
                    }
 
                
                }
                if (!$convoText){
                    $convoText = "How was your day today?";
                }
                ?>

<?php 
  $page_name = 'Icebreakers'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main class="affirmations_main">
        <div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/forum.svg"/>
                <h1 class="main_label_header TL">Icebreakers</h1>
            </div>
            <p class="BM main_label_caption">
                Here are some ideas for ways to start a conversation with someone.
            </p>
        </div>
        <div class="affirmations_main_content FCJA">
            <h2 id="affirmation-container" class="affirmations_main_content_affirmation TL C">
                <?php echo $convoText; ?>
            </h2>
            <div class="affirmations_main_content_buttons flex">
            <form id="saveButton" method="post" action="">
                <button name="toggle" id="toggle" class="affirmations_main_content_button save flex aicenter round <?php echo $litClassToggle; ?>">
                        <img class="icon" src="media/icons/affirmationsSave.svg"/>
                        <p class="affirmations_main_content_button_label LL">Save</p>
                </button>
            </form>
            <a class="flex aicenter" href="">
                    <button name="regenerate" class="affirmations_main_content_button regenerate flex aicenter round">
                        <img class="icon" src="media/icons/regen.svg"/>
                        <p class="affirmations_main_content_button_label LL">Regenerate</p>
            </button>
            </a>
            </div>
        </div>
    </main>

    
    <?php 
  include_once __DIR__ . '/components/footer.php'
?>
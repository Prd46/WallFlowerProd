<?php include_once __DIR__ . '/connection.php';
?>

<?php
                $litClassToggle = "1";
                $litClassToggle2 = "0";
                $litClassToggle3 = "0";
                $litClassToggle4 = "0";
                $spinToggle = "";
                $affirmationText = "How was your day today?";


                if (!$_POST) {
                    $query = 'SELECT *';
                    $query .= ' FROM ConversationStarters';
                    $query .= " WHERE starterRead = FALSE";
                    $query .= " ORDER BY id";
                    // $query .= " ORDER BY RAND()";
                    $query .= " LIMIT 1;";
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);
                    $spinToggle = "spin";

                    if (mysqli_num_rows($features) > 0) {





                        $current_value = $row['starterSaved'];
                        if ($current_value == false){
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                        }else{
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                        }

                        $updateSql = "UPDATE ConversationStarters SET starterRead = TRUE WHERE id = " . $row["id"];
                        mysqli_query($db_connection, $updateSql);
                        $affirmationText = $row["conversationStarter"];
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


                        // Toggle the value
                        if ($current_value == false){
                            // $litClassToggle = "saveLit";
                            $updateSql = "UPDATE ConversationStarters SET starterSaved = TRUE WHERE id = " . $row["id"];
                            $litClassToggle3 = "1";
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                            mysqli_query($db_connection, $updateSql);
                            $affirmationText = $row["conversationStarter"];
                        }else{
                            $litClassToggle4 = "1";
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                            // $litClassToggle = "saveUnlit";
                            $updateSql = "UPDATE ConversationStarters SET starterSaved = FALSE WHERE id = " . $row["id"];
                            mysqli_query($db_connection, $updateSql);
                            $affirmationText = $row["conversationStarter"];
                        }

                        
                        // if ($current_value == false){
                            
                        // }else{
                         
                        // }
                    }
 
                
                }
                if (!$affirmationText){
                    $affirmationText = "How was your day today?";
                    header("Refresh:0");
                }
                ?>

<?php 
  $page_name = 'Icebreakers'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
        <a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt="image">
        <p class=" BS label_back_text">Explore</p>
        </a>
    <main class="affirmations_main">
        <div class="main_label">

            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/forum.svg" alt="image">
                <h1 class="main_label_header TL">Icebreakers</h1>
            </div>
            <p class="BSH main_label_caption cscap">
                Here are some ideas for ways to start a conversation with someone.
            </p>
        </div>
        <div class="affirmations_main_content FCJA">
            <h2 id="affirmation-container" class="affirmations_main_content_affirmation TL C">
                <?php echo $affirmationText; ?>
            </h2>
            <div class="affirmations_main_content_buttons flex">

            <a class="flex aicenter" href="">
                    <div class="affirmations_main_content_button regenerate flex aicenter round">
                        <img class="icon <?php echo $spinToggle?>" src="media/icons/regen.svg" alt="image">
            </div>
                </a>

            <form id="saveButton" method="post" action="">
                <button name="toggle" id="toggle" class="affirmations_main_content_button save flex aicenter round <?php echo $litClassToggle; ?>">
                        <img style="opacity:<?php echo $litClassToggle?>;" class="icon AffSaveUnlit bookmark" src="media/icons/affirmationsSave.svg" alt="image">
                        <img style="opacity:<?php echo $litClassToggle2?>;" class="icon AffSaveLit" src="media/icons/savedLit.svg" alt="image">
                </button>
            </form>
 
            </div>
            <!-- <div class="saved_notification">
                <p class="BM saved_notification_text" style="opacity:<?php echo $litClassToggle3?>;">Icebreaker saved!</p>
                <p class="BM saved_notification_text" style="opacity:<?php echo $litClassToggle4?>;">Removed from saved.</p>
            </div> -->
        </div>

        

        <div class="affirmations_saved_switch">
            
            <div class="saved_switch_left saved_switch_lit">
            <img class="check" src="media/icons/oldCheck.svg" alt="image">
                <h3 class="LM">All</h3>
            </div>
            <a href="csSaved.php" class="saved_switch_right">
                <h3 class="LM">Saved</h3>
            </a>
        </div>
    </main>

    <?php 
  include_once __DIR__ . '/components/footer.php'
?>
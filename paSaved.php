<?php include_once __DIR__ . '/connection.php';
?>

<?php
                $litClassToggle = "1";
                $litClassToggle2 = "0";
                $litClassToggle3 = "0";
                $litClassToggle4 = "0";
                $affirmationText = "I have value.";
                $spinToggle ="";


                if (!$_POST) {
                    $query = 'SELECT *';
                    $query .= ' FROM Affirmations';
                    $query .= " WHERE ASR = FALSE";
                    $query .= " AND affirmationSaved = TRUE";
                    $query .= " ORDER BY id";
                    $query .= " LIMIT 1;";
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);
                    $spinToggle="spin";


                    if (mysqli_num_rows($features) > 0) {





                        $current_value = $row['affirmationSaved'];
                        if ($current_value == false){
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                        }else{
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                        }

                        $updateSql = "UPDATE Affirmations SET ASR = TRUE WHERE id = " . $row["id"];
                        mysqli_query($db_connection, $updateSql);
                        $affirmationText = $row["affirmation"];
                    } else {
                        $resetReadStatusSql = "UPDATE Affirmations SET ASR = FALSE";
                        mysqli_query($db_connection, $resetReadStatusSql);

                        
                    }
         }




                // Handle button click
                if (isset($_POST['toggle'])) {
                    $query = 'SELECT *';
                    $query .= ' FROM Affirmations';
                    $query .= " WHERE ASR = TRUE";
                    $query .= " ORDER BY id DESC";
                    $query .= " LIMIT 1;";
                    $site_url = site_url();
                    // echo $db_connection;
                    // echo $query;  
                    $features = mysqli_query($db_connection, $query);
                    $row = mysqli_fetch_assoc($features);


                    // Fetch the current 'saved' value from the database
                    if (mysqli_num_rows($features) > 0){




                        $current_value = $row['affirmationSaved'];


                        // Toggle the value
                        if ($current_value == false){
                            // $litClassToggle = "saveLit";
                            $updateSql = "UPDATE Affirmations SET affirmationSaved = TRUE WHERE id = " . $row["id"];
                            $litClassToggle3 = "1";
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                            mysqli_query($db_connection, $updateSql);
                            $affirmationText = $row["affirmation"];
                        }else{
                            $litClassToggle4 = "1";
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                            // $litClassToggle = "saveUnlit";
                            $updateSql = "UPDATE Affirmations SET affirmationSaved = FALSE WHERE id = " . $row["id"];
                            mysqli_query($db_connection, $updateSql);
                            $affirmationText = $row["affirmation"];
                        }

                        
                        // if ($current_value == false){
                            
                        // }else{
                         
                        // }
                    }
 
                
                }
                if (!$affirmationText){
                    $affirmationText = "I have value.";
                    header("Refresh:0");
                    
                }
                ?>

<?php 
  $page_name = 'Saved Affirmations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
    <a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt='image'>
        <p class=" BS label_back_text">Explore</p>
        </a>
    <main class="affirmations_main">

        <div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/affirmationNew.svg" alt='image'>
                <h1 class="main_label_header TL">Affirmations</h1>
            </div>
            <p class="BSH main_label_caption bookmark">
                Here are phrases to inspire and uplift.
            </p>
        </div>
        <div class="affirmations_main_content FCJA">
            <h2 id="affirmation-container" class="affirmations_main_content_affirmation TL C">
                <?php echo $affirmationText; ?>
            </h2>
            <div class="affirmations_main_content_buttons flex">

            <a class="flex aicenter" href="<?php echo $site_url?>/paSaved.php">
                    <div class="affirmations_main_content_button regenerate flex aicenter round">
                        <img class="icon <?php echo $spinToggle?>" src="media/icons/regen.svg" alt='image'>
            </div>
                </a>

            <form id="saveButton" method="post" action="">
                <button name="toggle" id="toggle" class="affirmations_main_content_button save flex aicenter round <?php echo $litClassToggle; ?>">
                        <img style="opacity:<?php echo $litClassToggle?>;" class="icon AffSaveUnlit bookmark" src="media/icons/affirmationsSave.svg" alt='image'>
                        <img style="opacity:<?php echo $litClassToggle2?>;" class="icon AffSaveLit" src="media/icons/savedLit.svg" alt='image'>
                </button>
            </form>
 
            </div>
            <!-- <div class="saved_notification">
                <p class="BM saved_notification_text" style="opacity:<?php echo $litClassToggle3?>;">Affirmation saved!</p>
                <p class="BM saved_notification_text" style="opacity:<?php echo $litClassToggle4?>;">Removed from saved.</p>
            </div> -->
        </div>

        

        <div class="affirmations_saved_switch">
        <a href="affirmations.php" class="saved_switch_left">
            
            
                <h3 class="LM">All</h3>

            </a>

            <div class="saved_switch_right saved_switch_lit">
                <img class="check" src="media/icons/oldCheck.svg">
                <h3 class="LM">Saved</h3>
                </div>
        </div>
    </main>

    <?php 
  include_once __DIR__ . '/components/footer.php'
?>
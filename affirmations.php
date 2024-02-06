<?php include_once __DIR__ . '/connection.php';
?>

<?php
                $litClassToggle = "";
                /*SELECT QUESTION
                FROM Questions
                ORDER BY RAND()  
                LIMIT 1; */
                $query = 'SELECT *';
                $query .= ' FROM Affirmations';
                $query .= " WHERE affirmationRead = FALSE";
                $query .= " ORDER BY RAND()";
                $query .= " LIMIT 1;";
                $site_url = site_url();
                // echo $db_connection;
                // echo $query;  
                $features = mysqli_query($db_connection, $query);
                $row = mysqli_fetch_assoc($features);

                // Handle button click
                // if (isset($_POST['toggle'])) {
                    // Fetch the current 'saved' value from the database
                    if (mysqli_num_rows($features) > 0){
                        $affirmationText = $row["affirmation"];
                        $current_value = $row['affirmationSaved'];
                        
                        // Toggle the value
                        if ($current_value == false){
                            // $litClassToggle = "saveLit";
                            $updateSql = "UPDATE Affirmations SET affirmationSaved = TRUE WHERE id = " . $row["id"];
                            mysqli_query($db_connection, $updateSql);
                        }else{
                            // $litClassToggle = "saveUnlit";
                            $updateSql = "UPDATE Affirmations SET affirmationSaved = FALSE WHERE id = " . $row["id"];
                            mysqli_query($db_connection, $updateSql);
                        }
                    }
                // }
                
                if (isset($_POST['regenerate'])) {
                    if (mysqli_num_rows($features) > 0) {
                        $record_id = $row["id"];
                        $affirmationText = $row["affirmation"];
                        $updateSql = "UPDATE Affirmations SET affirmationRead = TRUE WHERE id = " . $row["id"];
                        mysqli_query($db_connection, $updateSql);
                    } else {
                        $resetReadStatusSql = "UPDATE Affirmations SET affirmationRead = FALSE";
                        mysqli_query($db_connection, $resetReadStatusSql);
                        $row = mysqli_fetch_assoc($features);
                        $affirmationText = "I have value.";
                    }
            }

                ?>

<?php 
  $page_name = 'Affirmations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
    <main class="affirmations_main">
        <div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/lightbulb.svg"/>
                <h1 class="main_label_header TL">Affirmations</h1>
            </div>
            <p class="BM main_label_caption">
                Here are phrases to inspire and uplift.
            </p>
        </div>
        <div class="affirmations_main_content FCJA">
            <h2 id="affirmation-container" class="affirmations_main_content_affirmation TL C">
                <?php echo $affirmationText; ?>
            </h2>
            <div class="affirmations_main_content_buttons flex">
            <form id="saveButton" method="post" action="">
                <button name="toggle" id="toggle" class="affirmations_main_content_button save flex aicenter round">
                        <img class="icon" src="media/icons/affirmationsSave.svg"/>
                        <p class="affirmations_main_content_button_label LL">Save</p>
                </button>
            </form>
                <form id="regenButton" method="post" action="">
                    <button name="regenerate" class="affirmations_main_content_button regenerate flex aicenter round">
                        <img class="icon" src="media/icons/regen.svg"/>
                        <p class="affirmations_main_content_button_label LL">Regenerate</p>
            </button>
                </form>
            </div>
        </div>
    </main>

    <?php 
  include_once __DIR__ . '/components/footer.php'
?>
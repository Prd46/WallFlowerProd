<?php include_once __DIR__ . '/connection.php';
?>

<?php
                $litClassToggle = "1";
                $litClassToggle2 = "0";
                $litClassToggle3 = "0";
                $litClassToggle4 = "0";
                $spinToggle = "";
                $affirmationText = "I have value.";


                if (!$_POST) {
                    
                    //JOIN TABLE 
                    //ON LOAD, go to the table and parse the information
                    //Look into SQL JOIN. 
                    //Look at the affirmation ID, then look at the other table with a USER and AFFIRMATION ID. 
                    //Grab affirmation table, then new table, join them together, where affirmation.id = affirmation_actions.affirmation_id, ALSO where user_ID = affirmation_actions_user_ID

//                     SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
// FROM Orders
// INNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;


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

                    $spinToggle = "spin";
                    if (mysqli_num_rows($features) > 0) {
                        // echo "Yes";




                        $current_value = $row['affirmationSaved'];
                        if ($current_value == false){
                            $litClassToggle = "1";
                            $litClassToggle2 = "0";
                        }else{
                            $litClassToggle = "0";
                            $litClassToggle2 = "1";
                        }
                        //FOR USER
                        //go into the row to see if you have an existing user / affirmation ID. 
                        //If there isn't one, create one, if there is, update it. 

                        $updateSql = "UPDATE Affirmations SET affirmationRead = TRUE WHERE id = " . $row["id"];
                        mysqli_query($db_connection, $updateSql);
                        $affirmationText = $row["affirmation"];
                    } else {
                        // echo "No results";
                        $resetReadStatusSql = "UPDATE Affirmations SET affirmationRead = FALSE";
                        mysqli_query($db_connection, $resetReadStatusSql);

                        
                    }
         }




                // Handle button click
                if (isset($_POST['toggle'])) {
                    $query = 'SELECT *';
                    $query .= ' FROM Affirmations';
                    $query .= " WHERE affirmationRead = TRUE";
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
  $page_name = 'Affirmations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

    <main class="affirmations_main">
        
        <div class="main_label">
        <a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Explore</p>
        </a>
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/affirmationNew.svg"/>
                <h1 class="main_label_header TL">Affirmations</h1>
            </div>
            <p class="BM main_label_caption bookmark">
                Here are phrases to inspire and uplift.
            </p>
        </div>
        <div class="affirmations_main_content FCJA">
            <h2 id="affirmation-container" class="affirmations_main_content_affirmation TL C">
                <?php echo $affirmationText; ?>
            </h2>
            <div class="affirmations_main_content_buttons flex">

            <a class="flex aicenter" href="">
                    <button class="affirmations_main_content_button regenerate flex aicenter round">
                        <img class="icon <?php echo $spinToggle?>" src="media/icons/regen.svg"/>
                    </button>
                </a>

            <form id="saveButton" method="post" action="">
                <button name="toggle" id="toggle" class="affirmations_main_content_button save flex aicenter round <?php echo $litClassToggle; ?>">
                        <img style="opacity:<?php echo $litClassToggle?>;" class="icon saveUnlit bookmark" src="media/icons/affirmationsSave.svg"/>
                        <img style="opacity:<?php echo $litClassToggle2?>;" class="icon saveLit" src="media/icons/savedLit.svg"/>
                </button>
            </form>
 
            </div>
            <!-- <div class="saved_notification">
                <p class="BM saved_notification_text" style="opacity:<?php echo $litClassToggle3?>;">Affirmation saved!</p>
                <p class="BM saved_notification_text" style="opacity:<?php echo $litClassToggle4?>;">Removed from saved.</p>
            </div> -->
        </div>

        

        <div class="affirmations_saved_switch">
            
            <div class="saved_switch_left saved_switch_lit">
            <img class="check" src="media/icons/check.svg">
                <h3 class="LM">All</h3>
            </div>
            <a href="paSaved.php" class="saved_switch_right">
                <h3 class="LM">Saved</h3>
            </a>
        </div>
    </main>

    <?php 
  include_once __DIR__ . '/components/footer.php'
?>
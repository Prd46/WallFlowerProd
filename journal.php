<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Breathe'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>
<?php
                /*SELECT QUESTION
                FROM Questions
                ORDER BY RAND()  
                LIMIT 1; */
                $query = 'SELECT *';
                $query .= ' FROM JournalEntries';
                $query .= " ORDER BY EntryDate";

                $entries = mysqli_query($db_connection, $query);
                if ($entries->num_rows == 0){
                  $entries = false;
                  }
                
                // $site_url = site_url();
                // echo $db_connection;
                // echo $query;
                $checkAllReadSql = "SELECT COUNT(*) AS total_rows FROM Affirmations WHERE affirmationRead = TRUE";
                $checkResult = mysqli_query($db_connection, $checkAllReadSql);
                $totalRows = mysqli_fetch_assoc($checkResult)["total_rows"];
                ?>

<?php
                  if (!$entries) {
                    echo '<p>No results found</p>';
                }

        if ($entries){
                    while ($entry = mysqli_fetch_array($entries)) {
                        echo "
                        <div class='saved_listing'>
                        <p class=''>{$entry['EntryDate']}</p>
                        <p class=''>{$entry['emojiPath']}</p>
                        <p class=''>{$entry['title']}</p>
                        <p class=''>{$entry['entryText']}</p>
                        </div>";
                      } 
                }

?>

</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
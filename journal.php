<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Journal'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/edit.svg"/>
                <h1 class="main_label_header TL">Journal</h1>
            </div>
            <p class="BM main_label_caption">
            Here you can write your thoughts about your day.
            </p>
        </div>
<?php
                /*SELECT QUESTION
                FROM Questions
                ORDER BY RAND()  
                LIMIT 1; */
                $query = 'SELECT *';
                $query .= ' FROM JournalEntries';
                $query .= " ORDER BY EntryDate DESC";

                $entries = mysqli_query($db_connection, $query);
                if ($entries->num_rows == 0){
                  $entries = false;
                  }
                
                // $site_url = site_url();
                // echo $db_connection;
                // echo $query;
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
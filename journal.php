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
            <a href="newJournal.php">
              <div class="newJournalButton">
                  <h3>+ New Journal</h3>
              </div>
            </a>
        </div>
<?php
                /*SELECT QUESTION
                FROM Questions
                ORDER BY RAND()  
                LIMIT 1; */
                $query = 'SELECT *';
                $query .= ' FROM JournalEntries';
                $query .= " ORDER BY EntryDate DESC";
                $site_url = site_url();
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
                    echo '<h3 class="BS">Nothing here yet!</h3>';
                }

        if ($entries){
                    while ($entry = mysqli_fetch_array($entries)) {

                      $date = $entry['EntryDate'];
                      list($y, $m, $d) = explode('-', $date);
                      list($Cd, $mi, $s) = explode(':', $d);
                      list ($Ad, $h) = explode(' ', $Cd);

                      $monthWord = '';
                      if ($m == 01){
                        $monthWord = 'Jan.';
                      } if($m == 02){
                        $monthWord = 'Feb.';
                      } if($m == 03){
                        $monthWord = 'Mar.';
                      } if($m == 04){
                        $monthWord = 'Apr.';
                      } if($m == 05){
                        $monthWord = 'May';
                      } if($m == 06){
                        $monthWord = 'Jun.';
                      } if($m == 07){
                        $monthWord = 'Jul.';
                      } if ($m == 8){
                        $monthWord = 'Aug.';
                      }if ($m == 9){
                        $monthWord = 'Sep.';
                      }if ($m == 10){
                        $monthWord = 'Oct.';
                      }if ($m == 11){
                        $monthWord = 'Nov.';
                      }if ($m == 12){
                        $monthWord = 'Dec.';
                      }
                      
                      ;

                      echo
                      "
                  
                  <a href='{$site_url}/editJournal.php?id={$entry['id']}'>
                    <div class='leaf_card flex aicenter'>
                      <div class='journal_card_date'>
                        <h3 class='TL'>{$Ad}</h3>
                        <h3 class='BS'>{$monthWord}</h3>
                      </div>
                      <div class='journal_card_text'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$entry['title']}</h1>
                          </div>
                            <div class='leaf_card_caption'>
                            <p class='LM long_caption'>{$entry['entryText']}</p>
                          </div>
                        </div>
                    </div>
                  </a>

                  
                  ";
                      } 
                }

?>

</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
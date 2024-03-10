<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Puzzle List'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
  
?>

<?php
                $litClassToggle = "100%";
                $litClassToggle2 = "0";
                // $affirmationText = "I have value.";

                $query = "SELECT Puzzles.id, Puzzles.title, Puzzles.link, Puzzles.category, users.user_id, users.item_id, users.saved_status FROM Puzzles LEFT JOIN users ON Puzzles.id=users.item_id AND users.user_id='{$user['user_id']}' AND item_category='Puzzles'";
                // $query .= " ORDER BY RAND()";
                // $query .= " LIMIT 1;";
                $site_url = site_url();
                // echo $db_connection;
                // echo $query;  
                $features = mysqli_query($db_connection, $query);

?>
<a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt='image'>
        <p class=" BS label_back_text">Explore</p>
        </a>
<main>

<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/extension.svg" alt='image'>
                <h1 class="main_label_header TL">Puzzles</h1>
            </div>
            <p class="BSH main_label_caption">
            Here are some puzzles to help you unwind, de-stress, and focus
            </p>
        </div>


        <div class="filterButtons">
        <div class="filterButton js-all LM"><img class="check hidden" src="media/icons/check.svg" alt='image'><img class="uncheck" src="media/icons/unchecked.svg" alt='image'><div class="js-filter">All</div></div>
        <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt='image'><img class="uncheck" src="media/icons/unchecked.svg" alt='image'><div class="js-filter">Animals</div></div>
        <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt='image'><img class="uncheck" src="media/icons/unchecked.svg" alt='image'><div class="js-filter">Art</div></div>
        <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt='image'><img class="uncheck" src="media/icons/unchecked.svg" alt='image'><div class="js-filter">Nature</div></div>
            </div>



            <div class="articleListings">
              <?php
            while ($article = mysqli_fetch_array($features)) {
                $aid = $article['user_id'];
              $gid = $user['user_id'];
              // echo $aid;
              // echo $gid;

              if (($aid ==  $gid)&&($article['saved_status'])){
                $lit = 1;
              }else{
                $lit = 0;
              }

              $category = str_replace('_', ' ', $article['category']);
                  echo
                  "
                  <a href='{$site_url}/play.php?id={$article['id']}' class='{$article['category']} js-dbResult'>
                    <div class='leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon_1' src='media/puzzle_thumbnails/{$article['link']}.jpg' alt='image'>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$article['title']}</h3>
                          </div>

                          <div class='leaf_card_caption'>
                                <p class='LM'>{$category}</p>
                            </div> 

                            
                        </div>
                        <form class='save_button_container' method='post' action='{$site_url}/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='{$article['id']}'>

                            <input type='hidden' name='dbName' value='Puzzles'>
                            <input type='hidden' name='redirect' value='/puzzlelist.php'>
                                <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg' alt='image'>
                                        <img style='opacity:{$lit};' class='icon saveLit' src='media/icons/savedLit.svg' alt='image'>
                                </button>
                            </form>
                    </div>
                  </a>

                  
                  ";
                } 
                ?>
            </div>
</main>
<script src="scripts/dropdown.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
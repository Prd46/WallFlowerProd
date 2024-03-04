<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Sounds'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<?php
                $litClassToggle = "100%";
                $litClassToggle2 = "0";
                // $affirmationText = "I have value.";
                $query = "SELECT Audio.id, Audio.title, Audio.file, Audio.category, users.user_id, users.item_id, users.saved_status FROM Audio LEFT JOIN users ON Audio.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Audio'";
                // $query .= " ORDER BY RAND()";
                // $query .= " LIMIT 1;";
                $site_url = site_url();
                // echo $db_connection;
                // echo $query;  
                $features = mysqli_query($db_connection, $query);



?>
<!-- <div class="header_menu_vine">
</div> -->

<main>

<a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Explore</p>
        </a>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/headphones.svg"/>
                <h1 class="main_label_header TL">Sounds</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some soothing sounds, music samples, and audio tracks that can help create a nice and calming atmosphere.
            </p>
            <div class="filterButtons">
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><div class="js-filter">Binaural</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><div class="js-filter">Classical</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><div class="js-filter">Guided Imagery</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><div class="js-filter">Guided Meditation</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><div class="js-filter">Lo fi</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><div class="js-filter">Color Noise</div></div>
            </div>
             <!-- ONE LEAF CARD -->

             <div class="articleListings">
              <?php
            while ($article = mysqli_fetch_array($features)) {
              $aid = $article['user_id'];
              $gid = $user_data['user_id'];
              // echo $aid;
              // echo $gid;

              if (($aid ==  $gid)&&($article['saved_status'])){
                $lit = 1;
              }else{
                $lit = 0;
              }

              $category = str_replace('_', ' ', $article['category']);

              $fileTitle = $article['file'];
                list($f, $e) = explode('.', $fileTitle);
                  echo
                  "
                  
                  <a href='{$site_url}/sound.php?id={$article['id']}' class='{$article['category']} js-dbResult'>
                    <div class='leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon_1' src='media/AudioThumbnails/{$f}.jpg'/>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$article['title']}</h3>
                          </div>

                          <div class='leaf_card_caption'>
                                <p class='LM'>{$category}</p>
                            </div> 

                            
                        </div>
                        <form class='save_button_container'  id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='{$article['id']}'>

                            <input type='hidden' name='dbName' value='Audio'>
                            <input type='hidden' name='redirect' value='/listen.php'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:{$lit};' class='icon saveLit' src='media/icons/savedLit.svg'/>
                                </button>
                            </form>
                    </div>
                  </a>

                  
                  ";
                } 
                ?>
            </div>
        </div>
</main>
<script src="scripts/dropdown.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>

<style>

.icon-1 {
    margin-left: 113px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-2 {
    margin-left: 95px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-3 {
    margin-left: 135px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-4 {
    margin-left: 135px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.leaf_icon_1{
    width: 80px;
    height: 80px;
    border-top-left-radius: 12px;
    border-bottom-right-radius: 12px;
}
</style>

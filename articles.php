<?php 
   include_once __DIR__ . '/connection.php';
?>
<?php
                $litClassToggle = "";
                // $affirmationText = "I have value.";
                $query = "SELECT Articles.id, Articles.Title, Articles.Link, Articles.Category, Articles.Source, users.user_id, users.item_id, users.saved_status FROM Articles LEFT JOIN users ON Articles.id=users.item_id AND users.user_id='{$user['user_id']}' AND item_category='Articles'";
                // $query .= " ORDER BY RAND()";
                // $query .= " LIMIT 1;";
                $site_url = site_url();
                // echo $db_connection;
                // echo $query;  
                $features = mysqli_query($db_connection, $query);
?>

<!-- <div class='imageContainer'>
                  <img src='{$site_url}/media/{$article['image_path']}.jpg' class='tableImage2 featuredReelImage' alt='article Image'>
                    <div class='imageContainerText'>
                      <p class='postText'>{$article['title']}</p>
                      <p class='postText'>{$article['prepTime']}</p>
                      <p class='postText'>{$article['rating']}</p>
                    </div>
                  </div> -->



  <?php
  $page_name = 'Articles'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt="image">
        <p class=" BS label_back_text">Explore</p>
        </a>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/newsmode.svg"/>
                <h1 class="main_label_header TL">Articles</h1>
            </div>
            <p class="BSH main_label_caption">
            Here are some advice articles to help better understand and manage feelings of social anxiety.
            </p>
            <div class="filterButtons">
            <div class="filterButton js-all LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">All</div></div>
            <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Meditation</div></div>
            <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Causes of Social Anxiety</div></div>
            <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Social Improvement</div></div>
            </div>
            <!-- <div class="categoryDropdown js-dropdown .js-dropdown_closed">
              <div class="LM dropdownButton js-categoryButton">Category</div>
              <div class="dropdownListings">
                <div class="LM dropdownListing js-meditation hidden">Meditation</div>
                <div class="LM dropdownListing js-causes hidden">Causes of Social Anxiety</div>
                <div class="LM dropdownListing js-social hidden">Social Improvement</div>
              </div>
            </div> -->
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

              $category = str_replace('_', ' ', $article['Category']);
                  echo
                  "
                  
                  <a href='{$site_url}/article.php?id={$article['id']}' class='{$article['Category']} js-dbResult'>
                    <div class='large_leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon' src='media/icons/newsmode.svg' alt='image'>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$article['Title']}</h1>
                          </div>
                            <div class='leaf_card_caption'>
                            <p class='LM'>- {$article['Source']}</p>
                          </div>
                        </div>
                        <form class ='save_button_container' id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='{$article['id']}'>

                            <input type='hidden' name='dbName' value='Articles'>
                            <input type='hidden' name='redirect' value='/articles.php'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
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
        </div>
</main>
<script src="scripts/dropdown.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
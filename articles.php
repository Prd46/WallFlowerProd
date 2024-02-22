<?php 
   include_once __DIR__ . '/connection.php';
?>
<?php
                $litClassToggle = "";
                // $affirmationText = "I have value.";
                $query = 'SELECT *';
                $query .= ' FROM Articles';
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
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/newsmode.svg"/>
                <h1 class="main_label_header TL">Articles</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some advice articles to help better understand and manage feelings of social anxiety.
            </p>
            <div class="filterButtons">
              <div class="filterButton LM">Meditation</div>
              <div class="filterButton LM">Causes of Social Anxiety</div>
              <div class="filterButton LM">Social Improvement</div>
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

              $category = str_replace('_', ' ', $article['Category']);
                  echo
                  "
                  
                  <a href='{$site_url}/article.php?id={$article['id']}' class='{$article['Category']} js-dbResult'>
                    <div class='large_leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon' src='media/icons/newsmode.svg'/>
                      </div>
                      <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$article['Title']}</h1>
                          </div>
                            <div class='leaf_card_caption'>
                            <p class='LM'>- {$article['Source']}</p>
                          </div>
                        </div>
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
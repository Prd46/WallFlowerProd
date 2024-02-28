<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Puzzle List'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
  
?>

<?php
                $litClassToggle = "100%";
                $litClassToggle2 = "0";
                // $affirmationText = "I have value.";
                $query = 'SELECT *';
                $query .= ' FROM Puzzles';
                // $query .= " ORDER BY RAND()";
                // $query .= " LIMIT 1;";
                $site_url = site_url();
                // echo $db_connection;
                // echo $query;  
                $features = mysqli_query($db_connection, $query);

?>

<main>
<a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Explore</p>
        </a>

<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/extension.svg"/>
                <h1 class="main_label_header TL">Puzzles</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some puzzles to help you unwind, destress, and focus
            </p>
        </div>


        <div class="filterButtons">
        <div class="filterButton LM"><img class="check hidden" src="/media/icons/check.svg"><div class="js-filter">Animals</div></div>
        <div class="filterButton LM"><img class="check hidden" src="/media/icons/check.svg"><div class="js-filter">Art</div></div>
        <div class="filterButton LM"><img class="check hidden" src="/media/icons/check.svg"><div class="js-filter">Nature</div></div>
            </div>



            <div class="articleListings">
              <?php
            while ($article = mysqli_fetch_array($features)) {

              $category = str_replace('_', ' ', $article['category']);
                  echo
                  "
                  <a href='{$site_url}/play.php?id={$article['id']}' class='{$article['category']} js-dbResult'>
                    <div class='leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon_1' src='media/puzzle_thumbnails/{$article['link']}.jpg'/>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$article['title']}</h1>
                          </div>

                          <div class='leaf_card_caption'>
                                <p class='LM'>{$category}</p>
                            </div> 

                            
                        </div>
                        <form class='save_button_container'  id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='{$article['id']}'>

                            <input type='hidden' name='dbName' value='Puzzles'>
                            <input type='hidden' name='colName' value='puzzleSaved'>
                            <input type='hidden' name='redirect' value='/puzzlelist.php'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:{$article['puzzleSaved']};' class='icon saveLit' src='media/icons/savedLit.svg'/>
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

<style>


    /* FLITER UI CSS */
.toggle-button {
    background-color: #D2EC9F;
    border: none;
    color: black;
    padding: 13px 22px;
    text-align: center;
    text-decoration: none;
    /* display: inline-block; */
    font-size: 16px;
    margin: 4px 2px;
    margin-top: 25px;
    cursor: pointer;
    border-radius: 12px;
    transition: background-color 0.3s ease;
}

.toggle-button:hover{
    background-color: #e0e0e0;
}


.icon1 {
    width: 20px;
    height: 20px;
    vertical-align: middle;
}

.hide {
    display: none;
}



    /* THIS IS THE PUZZLE LIST CSS */
.icon-1 {
    margin-left: 155px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-2 {
    margin-left: 126px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-3 {
    margin-left: 137px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-4 {
    margin-left: 124px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-5 {
    margin-left: 111px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-6 {
    margin-left: 104px; /* Adjust the spacing between the button and the bookmark icon */
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
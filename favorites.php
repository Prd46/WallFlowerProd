<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Saved'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<?php 

$site_url = site_url();


$affirmationQuery = 'SELECT * FROM Affirmations WHERE affirmationSaved = TRUE';
$affirmationPull = mysqli_query($db_connection, $affirmationQuery);
// $affirmation = mysqli_fetch_assoc($affirmationPull);

$convoQuery = 'SELECT * FROM ConversationStarters WHERE starterSaved = TRUE';
$convoPull = mysqli_query($db_connection, $convoQuery);
// $convo = mysqli_fetch_assoc($convoPull);


$soundQuery = "SELECT Audio.id, Audio.title, Audio.file, Audio.category, users.user_id, users.item_id, users.saved_status FROM Audio INNER JOIN users ON Audio.id=users.item_id AND users.user_id='{$user['user_id']}' AND item_category='Audio' AND users.saved_status = TRUE";
$soundPull = mysqli_query($db_connection, $soundQuery);
// $sound = mysqli_fetch_assoc($soundPull);

$medQuery = "SELECT Meditations.id, Meditations.meditationName, Meditations.type, users.user_id, users.item_id, users.saved_status FROM Meditations INNER JOIN users ON Meditations.id=users.item_id AND users.user_id='{$user['user_id']}' AND item_category='Meditations' AND users.saved_status = TRUE";
$medPull = mysqli_query($db_connection, $medQuery);
// $med = mysqli_fetch_assoc($medPull);

$articleQuery = "SELECT Articles.id, Articles.Title, Articles.Source, Articles.Category, users.user_id, users.item_id, users.saved_status FROM Articles INNER JOIN users ON Articles.id=users.item_id AND users.user_id='{$user['user_id']}' AND item_category='Articles' AND users.saved_status = TRUE";
$articlePull = mysqli_query($db_connection, $articleQuery);
// $article = mysqli_fetch_assoc($articlePull);

$puzzleQuery = "SELECT Puzzles.id, Puzzles.title, Puzzles.link, Puzzles.category, users.user_id, users.item_id, users.saved_status FROM Puzzles INNER JOIN users ON Puzzles.id=users.item_id AND users.user_id='{$user['user_id']}' AND item_category='Puzzles' AND users.saved_status = TRUE";
$puzzlePull = mysqli_query($db_connection, $puzzleQuery);
// $puzzle = mysqli_fetch_assoc($puzzlePull);

?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/blackbookmark.svg" alt="image">
                <h1 class="main_label_header TL">Saved</h1>
            </div>
            <p class="BM main_label_caption">
            Here's a list of some of your saved affirmations, icebreakers, audios, and more.
            </p>
            <div class="filterButtons">
            <div class="filterButton js-all LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">All</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Sounds</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Meditations</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Articles</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Puzzles</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Affirmations</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg" alt="image"><img class="uncheck" src="media/icons/unchecked.svg" alt="image"><div class="js-filter">Icebreakers</div></div>
            </div>
        </div>
 <!-- ONE LEAF CARD -->
 <div class="favorite_results">
 <?php if (mysqli_num_rows($soundPull) > 0){
    echo"
 <div class='All Sounds js-dbResult'>
    <h3 class='TL'>Sounds</h3>
    ";
 }
    ?>
<?php  while ($soundList = mysqli_fetch_array($soundPull)){
                   $soundCategory = str_replace('_', ' ', $soundList['category']);

                   $fileTitle = $soundList['file'];
                     list($f, $e) = explode('.', $fileTitle);
echo 
"
<a href='sound.php?id={$soundList['id']}' class='Sounds js-dbResult All'>
            <div class='leaf_card flex aicenter'>
            <div class='leaf_card_image'>
                <img class='icon leaf_icon_1' src='media/AudioThumbnails/{$f}.jpg' alt='image'>
            </div>

                        <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>{$soundList['title']}</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>Sounds</p>
                        </div>
                    </div>
                    <form class='save_button_container' method='post' action='{$site_url}/includes/saveFunction.php'>
                      <input type='hidden' name='id' value='{$soundList['id']}'>

                      <input type='hidden' name='dbName' value='Audio'>
                      <input type='hidden' name='redirect' value='/favorites.php'>
                          <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                  <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg' alt='image'>
                                  <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg' alt='image'>
                          </button>
                      </form>

                </div>
        </a>
        </div>
        ";
 };
 ?>

 <?php if (mysqli_num_rows($medPull) > 0){
    echo"
 <div class='All Meditations js-dbResult'>
    <h3 class='TL'>Meditations</h3>
    ";
 }
    ?>
<?php while ($medList = mysqli_fetch_array($medPull)){
echo 
"
<a href='sound.php?id={$medList['id']}' class='Meditations js-dbResult All'>
        <div class='leaf_card flex aicenter'>
            <div class='leaf_card_image'>
                <img class='icon leaf_icon' src='media/icons/meditation.svg' alt='image'>
            </div>

                    <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>{$medList['meditationName']}</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>{$medList['type']}</p>
                        </div>
                    </div>
                    <form class='save_button_container' method='post' action='{$site_url}/includes/saveFunction.php'>
                    <input type='hidden' name='id' value='{$medList['id']}'>
    
                    <input type='hidden' name='dbName' value='Meditations'>
                    <input type='hidden' name='redirect' value='/favorites.php'>
                        <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg' alt='image'>
                                <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg' alt='image'>
                        </button>
                    </form>
                </div>
        </a>
        </div>
        ";
 };
 ?>
 <?php if (mysqli_num_rows($articlePull) > 0){
    echo"
 <div class='All Articles js-dbResult'>
    <h3 class='TL'>Articles</h3>
    ";
 }
    ?>
        <?php while ($artList = mysqli_fetch_array($articlePull)){
echo 
"

        <a href='{$site_url}/article.php?id={$artList['id']}' class='Articles js-dbResult All'>
                    <div class='large_leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon' src='media/icons/newsmode.svg' alt='image'>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$artList['Title']}</h1>
                          </div>
                            <div class='leaf_card_caption'>
                            <p class='LM'>- {$artList['Source']}</p>
                          </div>
                        </div>
                        <form class='save_button_container'   method='post' action='{$site_url}/includes/saveFunction.php'>
                    <input type='hidden' name='id' value='{$artList['id']}'>
    
                    <input type='hidden' name='dbName' value='Articles'>
                    <input type='hidden' name='redirect' value='/favorites.php'>
                        <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg' alt='image'>
                                <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg' alt='image'>
                        </button>
                    </form>
    

            </div>
            </a>

";
};
?>
<?php if (mysqli_num_rows($puzzlePull) > 0){
    echo"
 <div class='All Puzzles js-dbResult'>
    <h3 class='TL'>Puzzles</h3>
    ";
 }
    ?>
<?php while ($pList = mysqli_fetch_array($puzzlePull)){
$category = str_replace('_', ' ', $pList['category']);
                  echo
                  "
                  <a href='{$site_url}/play.php?id={$pList['id']}' class='Puzzles js-dbResult All'>
                    <div class='leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon_1' src='media/puzzle_thumbnails/{$pList['link']}.jpg' alt='image'>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$pList['title']}</h1>
                          </div>

                          <div class='leaf_card_caption'>
                                <p class='LM'>Puzzles</p>
                            </div> 

                            
                        </div>
                        <form class='save_button_container' method='post' action='{$site_url}/includes/saveFunction.php'>
                    <input type='hidden' name='id' value='{$pList['id']}'>
    
                    <input type='hidden' name='dbName' value='Puzzles'>
                    <input type='hidden' name='redirect' value='/favorites.php'>
                        <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg' alt='image'>
                                <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg' alt='image'>
                        </button>
                    </form>
              
                        </div>
                        </a>
                        ";
};
?>
     <?php if (mysqli_num_rows($affirmationPull) > 0){
    echo"
 <div class='All Affirmations js-dbResult'>
    <h3 class='TL'>Affirmations</h3>
    ";
 }
    ?>
 <?php 
 while ($affList = mysqli_fetch_array($affirmationPull)){
    $current_value = $affList['affirmationSaved'];
echo 
"

                    <div class='affirmationBox'>
                      <h3 class='BS affBoxText'>{$affList['affirmation']}</h3>

                      <form class='save_button_container' method='post' action='{$site_url}/includes/saveFunction.php'>
                      <input type='hidden' name='id' value='{$affList['id']}'>

                      <input type='hidden' name='dbName' value='Affirmations'>
                      <input type='hidden' name='colName' value='affirmationSaved'>
                      <input type='hidden' name='redirect' value='/favorites.php'>
                          <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                  <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg' alt='image'>
                                  <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg' alt='image'>
                          </button>
                      </form>


                    </div>
                    </div>
        ";
 };
 ?>
 <?php if (mysqli_num_rows($convoPull) > 0){
    echo"
 <div class='All Icebreakers js-dbResult'>
    <h3 class='TL'>Icebreakers</h3>
    ";
 }
    ?>
 <?php 
 while ($conList = mysqli_fetch_array($convoPull)){
    $current_value = $conList['starterSaved'];

echo 
"

                    <div class='affirmationBox'>
                      <h3 class='BS affBoxText'>{$conList['conversationStarter']}</h3>

                      <form class='save_button_container' method='post' action='{$site_url}/includes/saveFunction.php'>
                      <input type='hidden' name='id' value='{$conList['id']}'>

                      <input type='hidden' name='dbName' value='ConversationStarters'>
                      <input type='hidden' name='colName' value='starterSaved'>
                      <input type='hidden' name='redirect' value='/favorites.php'>
                          <button name='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                  <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg' alt='image'>
                                  <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg' alt='image'>
                          </button>
                      </form>


                    </div>
        ";
 };
 ?>
<?php 
if ((mysqli_num_rows($affirmationPull) == 0) && (mysqli_num_rows($convoPull) == 0) && (mysqli_num_rows($soundPull) == 0) && (mysqli_num_rows($medPull) == 0) && (mysqli_num_rows($articlePull) == 0) && (mysqli_num_rows($puzzlePull) == 0)){
    echo"<p class='LL'>Nothing saved yet!</p>";
}
?>
</main>
<script src="scripts/dropdown.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
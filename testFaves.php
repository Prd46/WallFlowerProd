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


$soundQuery = "SELECT Audio.id, Audio.title, Audio.file, Audio.category, users.user_id, users.item_id, users.saved_status FROM Audio INNER JOIN users ON Audio.id=users.item_id AND users.saved_status = TRUE AND users.user_id={$user_data['user_id']} AND item_category='Audio'";
// $query = "SELECT Audio.id, Audio.title, Audio.file, Audio.category, users.user_id, users.item_id, users.saved_status FROM Audio LEFT JOIN users ON Audio.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Audio'";
$soundPull = mysqli_query($db_connection, $soundQuery);
// // $sound = mysqli_fetch_assoc($soundPull);

// $medQuery = "SELECT Meditations.id, Meditations.meditationName, Meditations.type, users.user_id, users.item_id, users.saved_status FROM Meditations INNER JOIN users ON Meditations.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Meditations' AND saved_status = TRUE";
// $medPull = mysqli_query($db_connection, $medQuery);
// // $med = mysqli_fetch_assoc($medPull);

// $articleQuery = "SELECT Articles.id, Articles.Title, Articles.Source, Articles.Category, users.user_id, users.item_id, users.saved_status FROM Articles INNER JOIN users ON Articles.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Articles' AND saved_status = TRUE";
// $articlePull = mysqli_query($db_connection, $articleQuery);
// // $article = mysqli_fetch_assoc($articlePull);

// $puzzleQuery = "SELECT Puzzles.id, Puzzles.title, Puzzles.link, Puzzles.category, users.user_id, users.item_id, users.saved_status FROM Puzzles INNER JOIN users ON Puzzles.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Puzzles' AND saved_status = TRUE";
// $puzzlePull = mysqli_query($db_connection, $puzzleQuery);
// $puzzle = mysqli_fetch_assoc($puzzlePull);

?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/blackbookmark.svg"/>
                <h1 class="main_label_header TL">Saved</h1>
            </div>
            <p class="BM main_label_caption">
            Here's a list of some of your saved affirmations, icebreakers, audios, and more.
            </p>
            <div class="filterButtons">
            <div class="filterButton js-all LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">All</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Sounds</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Meditations</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Articles</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Puzzles</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Affirmations</div></div>
              <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Icebreakers</div></div>
            </div>
        </div>
 <!-- ONE LEAF CARD -->
 
 </div>
</div>


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
                <img class='icon leaf_icon_1' src='media/AudioThumbnails/{$f}.jpg'/>
            </div>

                        <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>{$soundList['title']}</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>Sounds</p>
                        </div>
                    </div>
                    <form class='save_button_container'  id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                      <input type='hidden' name='id' value='{$soundList['id']}'>

                      <input type='hidden' name='dbName' value='Audio'>
                      <input type='hidden' name='redirect' value='/favorites.php'>
                          <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                  <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg'/>
                                  <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg'/>
                          </button>
                      </form>

                </div>
            </div>
        </a>
        ";
 };
 ?>
 </div>




</div>
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

                      <form class='save_button_container'  id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                      <input type='hidden' name='id' value='{$affList['id']}'>

                      <input type='hidden' name='dbName' value='Affirmations'>
                      <input type='hidden' name='colName' value='affirmationSaved'>
                      <input type='hidden' name='redirect' value='/favorites.php'>
                          <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                  <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg'/>
                                  <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg'/>
                          </button>
                      </form>


                    </div>
        ";
 };
 ?>
 </div>
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

                      <form class='save_button_container'  id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                      <input type='hidden' name='id' value='{$conList['id']}'>

                      <input type='hidden' name='dbName' value='ConversationStarters'>
                      <input type='hidden' name='colName' value='starterSaved'>
                      <input type='hidden' name='redirect' value='/favorites.php'>
                          <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                  <img class='icon saveUnlit underMark' src='media/icons/affirmationsSave.svg'/>
                                  <img style='opacity:1;' class='icon saveLit fixedBookmark' src='media/icons/savedLit.svg'/>
                          </button>
                      </form>


                    </div>
        ";
 };
 ?>
 </div>
</div>
<?php 
// if ((mysqli_num_rows($affirmationPull) == 0) && (mysqli_num_rows($convoPull) == 0) && (mysqli_num_rows($soundPull) == 0) && (mysqli_num_rows($medPull) == 0) && (mysqli_num_rows($articlePull) == 0) && (mysqli_num_rows($puzzlePull) == 0)){
//     echo"<p class='LL'>Nothing saved yet!</p>";
// }
?>
</main>
<script src="scripts/dropdown.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
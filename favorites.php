<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Saved'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<?php 

$site_url = site_url();


$affirmationQuery = 'SELECT * FROM Affirmations WHERE affirmationSaved = TRUE ORDER BY RAND()';
$affirmationPull = mysqli_query($db_connection, $affirmationQuery);
$affirmation = mysqli_fetch_assoc($affirmationPull);

$convoQuery = 'SELECT * FROM ConversationStarters WHERE starterSaved = TRUE ORDER BY RAND() LIMIT 1;';
$convoPull = mysqli_query($db_connection, $convoQuery);
$convo = mysqli_fetch_assoc($convoPull);


$soundQuery = "SELECT Audio.id, Audio.title, Audio.file, Audio.category, users.user_id, users.item_id, users.saved_status FROM Audio INNER JOIN users ON Audio.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Audio' AND saved_status = TRUE ORDER BY RAND()";
$soundPull = mysqli_query($db_connection, $soundQuery);
$sound = mysqli_fetch_assoc($soundPull);

$medQuery = "SELECT Meditations.id, Meditations.meditationName, Meditations.type, users.user_id, users.item_id, users.saved_status FROM Meditations INNER JOIN users ON Meditations.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Meditations' AND saved_status = TRUE ORDER BY RAND()";
$medPull = mysqli_query($db_connection, $medQuery);
$med = mysqli_fetch_assoc($medPull);

$articleQuery = "SELECT Articles.id, Articles.Title, Articles.Source, Articles.Category, users.user_id, users.item_id, users.saved_status FROM Articles INNER JOIN users ON Articles.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Articles' AND saved_status = TRUE ORDER BY RAND()";
$articlePull = mysqli_query($db_connection, $articleQuery);
$article = mysqli_fetch_assoc($articlePull);

$puzzleQuery = "SELECT Puzzles.id, Puzzles.title, Puzzles.link, Puzzles.category, users.user_id, users.item_id, users.saved_status FROM Puzzles INNER JOIN users ON Puzzles.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Puzzles' AND saved_status = TRUE ORDER BY RAND()";
$puzzlePull = mysqli_query($db_connection, $puzzleQuery);
$puzzle = mysqli_fetch_assoc($puzzlePull);

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
        </div>
 <!-- ONE LEAF CARD -->
 <div class="favorite_results">
 <?php if (mysqli_num_rows($affirmationPull) > 0){
echo 
"
<a href='paSaved.php'>
            <div class='leaf_card flex aicenter'>
                <div class='leaf_card_image'>
                    <img class='icon leaf_icon' src='media/icons/affirmationNew.svg'/>
                </div>

                    <div class='leaf_card_text'>
                      <h3 class='BS'>{$affirmation['affirmation']}</h3>
                        <!-- <div class='leaf_card_title'>
                            <h3 class='TS'>Affirmations</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>For when you need inspiration.</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </a>
        ";
 };
 ?>
 

 <?php if (mysqli_num_rows($convoPull) > 0){
echo 
"
<a href='csSaved.php'>
            <div class='leaf_card flex aicenter'>
                <div class='leaf_card_image'>
                    <img class='icon leaf_icon' src='media/icons/forum.svg'/>
                </div>

                    <div class='leaf_card_text'>
                      <h3 class='BS'>{$convo['conversationStarter']}</h3>
                    </div>
                </div>
            </div>
        </a>
        ";
 };
 ?>

<?php if (mysqli_num_rows($soundPull) > 0){
                   $soundCategory = str_replace('_', ' ', $sound['category']);

                   $fileTitle = $sound['file'];
                     list($f, $e) = explode('.', $fileTitle);
echo 
"
<a href='sound.php?id={$sound['id']}'>
            <div class='leaf_card flex aicenter'>
            <div class='leaf_card_image'>
                <img class='icon leaf_icon_1' src='media/AudioThumbnails/{$f}.jpg'/>
            </div>

                        <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>{$sound['title']}</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>Sounds</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        ";
 };
 ?>

<?php if (mysqli_num_rows($medPull) > 0){
echo 
"
<a href='sound.php?id={$med['id']}'>
            <div class='leaf_card flex aicenter'>
            <div class='leaf_card_image'>
                <img class='icon leaf_icon' src='media/icons/meditation.svg'/>
            </div>

                        <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>{$med['meditationName']}</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>{$med['type']}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        ";
 };
 ?>
        <!-- <a href="breathe.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/air.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Meditations</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BS">For when you need to breathe.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a> -->

        <?php if (mysqli_num_rows($articlePull) > 0){
echo 
"

        <a href='{$site_url}/article.php?id={$article['id']}' class='{$article['Category']} js-dbResult'>
                    <div class='large_leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon' src='media/icons/newsmode.svg'/>
                      </div>
                      <div class='leaf_card_text_non_index'>
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
};
?>
<?php if (mysqli_num_rows($puzzlePull) > 0){
$category = str_replace('_', ' ', $puzzle['category']);
                  echo
                  "
                  <a href='{$site_url}/play.php?id={$puzzle['id']}' class='{$puzzle['category']} js-dbResult'>
                    <div class='leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon_1' src='media/puzzle_thumbnails/{$puzzle['link']}.jpg'/>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$puzzle['title']}</h1>
                          </div>

                          <div class='leaf_card_caption'>
                                <p class='LM'>Puzzles</p>
                            </div> 

                            
                        </div>
                        </div>
                        </a>
                        ";
};

                        ?>
</div>
</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
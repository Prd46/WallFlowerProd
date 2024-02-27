<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Saved'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<?php 

$site_url = site_url();


$affirmationQuery = 'SELECT * FROM Affirmations WHERE affirmationSaved = TRUE ORDER BY RAND() LIMIT 1;';
$affirmationPull = mysqli_query($db_connection, $affirmationQuery);
$affirmation = mysqli_fetch_assoc($affirmationPull);

$convoQuery = 'SELECT * FROM ConversationStarters WHERE starterSaved = TRUE ORDER BY RAND() LIMIT 1;';
$convoPull = mysqli_query($db_connection, $convoQuery);
$convo = mysqli_fetch_assoc($convoPull);


$soundQuery = 'SELECT * FROM Audio WHERE audioSaved = TRUE ORDER BY RAND() LIMIT 1;';
$soundPull = mysqli_query($db_connection, $soundQuery);
$sound = mysqli_fetch_assoc($soundPull);

$articleQuery = 'SELECT * FROM Articles WHERE articleSaved = TRUE ORDER BY RAND() LIMIT 1;';
$articlePull = mysqli_query($db_connection, $articleQuery);
$article = mysqli_fetch_assoc($articlePull);

$puzzleQuery = 'SELECT * FROM Puzzles WHERE puzzleSaved = TRUE ORDER BY RAND() LIMIT 1;';
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
<a href='affirmations.php'>
            <div class='leaf_card flex aicenter'>
                <div class='leaf_card_image'>
                    <img class='icon leaf_icon' src='media/icons/lightbulb.svg'/>
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
<a href='conversationStarters.php'>
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
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
        <a href="listen.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/headphones.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Sounds</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BS">For when you need to relax.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="breathe.php">
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
        </a>
        <a href="articles.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/newsmode.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Articles</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BS">For when you need guidance.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/extension.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Puzzles</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BS">For when you're feeling playful.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        
</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
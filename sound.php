<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Audio'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php';

$query = "SELECT * FROM Audio WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);

$query2 = "SELECT * FROM users WHERE item_id = {$_GET['id']} AND user_id = '{$user['user_id']}' AND item_category='Audio'";
$result2 = mysqli_query($db_connection, $query2);
$row = "0";

if ($result2->num_rows > 0) {
  // Get row from results and assign to $user variable;
  $row = mysqli_fetch_assoc($result2);
  $seen = true;
}else{
  // echo "not seen";
  $seen = false;
}

if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $article = mysqli_fetch_assoc($result);

} else {
    $error_message = 'Audio does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}
$site_url = site_url();
$fileTitle = $article['file'];
list($f, $e) = explode('.', $fileTitle);
$category = str_replace('_', ' ', $article['category']);
?>
<a href="listen.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt="image">
        <p class=" BS label_back_text">Sounds</p>
        </a>

<main>


<div class="main_label">

            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/headphones.svg" alt="image">
                <h1 class="main_label_header TL"><?php echo $article['title'];?></h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Audio'>
                            <input type='hidden' name='redirect' value='/sound.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg' alt="image">
                                        <img style='opacity:0;opacity:<?php if($seen){echo $row['saved_status'];}?>' class='icon saveLit' src='media/icons/savedLit.svg' alt="image">
                                </button>
                            </form>


            </div>
            <p class="BSH main_label_caption"></p>
        </div>

<br><br>

<?php $firstCycle = 1?>
<div class="audiocontainer">
        <img src="media/AudioThumbnails/<?php echo $f?>.jpg" alt="Wallflower" class="audioimagecoffee">
        <div class="audiobuttons">
    <div class="musicstart" id="play"><img src="media/icons/play_arrow.svg" id="play_icon"  alt="image"></div>
    <input type="range" id="range" class="level" value="0" min="0">  
</div>
</div>




    

        <!--GUIDED IMAGERY  -->
        <div class="audio-text-container">
        <h3 class="audiotitle HS"><img src="media/icons/info.svg" alt="guide" class="guide"> <?php echo $category?></h3>
            <p class="audiodescription BM"><?php echo $article['description']?></p>
            
        
            <a href="<?php echo $article['learn_more']?>" target="_blank"> 
            <div class="LMContainer">
              <button class="learn-more-button">Learn More</button>
          </div>
          </a>
        </div>

</main>
<script>
music_name =
  "media/SoothingAudio/<?php echo $article['file'] ?>";
  let play_btn = document.querySelector("#play");
let range = document.querySelector("#range");
let play_icon = document.querySelector("#play_icon");
let total_time = 0;
let currentTime = 0;
let isPlaying = false;
let song = new Audio();

// Define paths for play and pause icons
const playIconPath = "media/icons/play_arrow.svg";
const pauseIconPath = "media/icons/pause_icon.svg";

// Set initial icon to play icon
play_icon.src = playIconPath;

// Add event listener to play button
play_btn.addEventListener("click", function () {
    if (!isPlaying) {
        song.src = music_name;
        song.play();
        isPlaying = true;
        total_time = song.duration;
        range.max = total_time;
        play_icon.src = pauseIconPath;
    } else {
        song.pause();
        isPlaying = false;
        play_icon.src = playIconPath;
    }
    song.addEventListener("ended", function () {
        song.currentTime = 0;
        song.pause();
        isPlaying = false;
        range.value = 0;
        play_icon.src = playIconPath;
    });
    song.addEventListener("timeupdate", function () {
        range.value = song.currentTime;
    });
    range.addEventListener("change", function () {
        song.currentTime = range.value;
    });
});

</script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>


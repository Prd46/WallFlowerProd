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
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Sounds</p>
        </a>

<main>


<div class="main_label">

            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/headphones.svg"/>
                <h1 class="main_label_header TL">Sounds</h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Audio'>
                            <input type='hidden' name='redirect' value='/sound.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:0;opacity:<?php if($seen){echo $row['saved_status'];}?>' class='icon saveLit' src='media/icons/savedLit.svg'/>
                                </button>
                            </form>


            </div>
            <p class="BM main_label_caption"><?php echo $article['title']?></p>
        </div>

<br><br>

<?php $firstCycle = 1?>
<div class="container">
        <img src="media/AudioThumbnails/<?php echo $f?>.jpg" alt="Wallflower" class="imagecoffee">
        <div class="buttons" src="path/to/icon.png">
    <button class="musicstart" id="play"><img id="play_icon"  alt=""></button>
    <input type="range" id="range" class="level" value="0" min="0">  
</div>
</div>




    

        <!--GUIDED IMAGERY  -->
        <div class="text-container">
        <h3 class="title HS"><img src="media/icons/phonecheck.svg" alt="guide" class="guide"> <?php echo $category?></h3>
            <p class="description BM"><?php echo $article['description']?></p>
            
        
            <a href="<?php echo $article['learn_more']?>" target="_blank"> 
            <div class="LMContainer">
              <button class="learn-more-button">Learn More</button></a>
          </div>
        </div>
    </div>

          </header>

</main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>

<!-- This is the play music JS script -->
<script>
 
</script>


<!-- This is the CSS for Sound img -->
<style>




input[type="range"] {
  accent-color: #506527;
}
#play_icon{
  height: 30px;
  width: 30px;
}
.wrapper {
  position: relative;
}
.buttons {
  display: flex;
  width: 100%;
  padding: 25px;
  margin: 0 35px;
  text-align: center;
  align-items: center;
}
.buttons button #play1 {
  position: relative;
  background-color: #e1e6ec;
  text-align: left;
  margin: 15px;
  border-radius: 10px;
}
.buttons button:active {
  background: #e1e6ec;
  box-shadow: inset 2px 2px 5px #a2b1c6, -2px -2px 11px #fff;
}
.buttons button i {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

.level {
  width: 100%;
  
  /* appearance: none; */
  background-color: var(--OffWhite);
  border-radius: 50px;
  margin: 28px;
}
.level::-webkit-slider-thumb {
  -webkit-appearance: none;
  box-shadow: 2px 2px 5px ;
  width: 15px;
  height: 15px;
  border-radius: 90px;

}
.level::-moz-range-thumb {
  width: 50px;
  height: 50px;
}





.guide {
    width: 25px; /* Adjust the width of the icon as needed */
    height: auto; /* Maintain aspect ratio */
    /* margin-right: 6px; */
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    max-width: 600px;
}

.imagecoffee {
    width: 315px;
    height: 315px;
    object-fit: cover;
    margin-bottom: 20px;
    border-radius: 12px;

}

.play-button {
    background-color: var(--OffWhite);
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-bottom: 20px;
    cursor: pointer;
}

/* GUIDED IMAGERY CSS HERE */
.text-container {
    display: flex;
    width: auto;
    min-width: 280px;
    max-width: 560px;
    flex-direction: column;
    /* align-items: flex-end; */
    border: 1px solid var(--Schemes-Primary, #506527);
    background-color: var(--OffWhite);
    border-radius:12px;
    /* height: 280px; */
    margin-bottom: 6em;
}

.Lontainer{
margin-left: 228px;
margin-bottom: 30px;
}

.title {
    text-align: left;
    margin-left: 28px;
    margin-right: 20px;
    margin-top: 40px;
}

.description {
    margin-bottom: 15px;
    margin-right: 35px;
    margin-left: 35px;
}

.learn-more-button {
    color: #506527;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    font: var(--LM);
    font-size: 16px;
    cursor: pointer;
    margin-right: 20px;
    background-color: var(--invis);

}
.LMContainer{
  display: flex;
  width: 100%;
  justify-content: flex-end;
}
.return-text {
    margin: 5px;
}

.icon {
    display: flex;
    align-items: center; /* Align items vertically in the center */
}
.musicstart {
  padding: .5rem;
  display: flex;
  justify-content: center;
  align-items: center;
  border-width: thin;
  border-radius: 60px;
  background-color: #e3e3d8;
  border: none;
}

</style>

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
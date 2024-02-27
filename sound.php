<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Audio'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php';

  $query = "SELECT * FROM Audio WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
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

<main>


<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/headphones.svg"/>
                <h1 class="main_label_header TL">Sounds</h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Audio'>
                            <input type='hidden' name='colName' value='audioSaved'>
                            <input type='hidden' name='redirect' value='/sound.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:<?php echo $article['audioSaved'];?>' class='icon saveLit' src='media/icons/savedLit.svg'/>
                                </button>
                            </form>


            </div>
            <p class="BM main_label_caption"><?php echo $article['title']?></p>
        </div>

<br><br>


<div class="container">
        <img src="media/AudioThumbnails/<?php echo $f?>.jpg" alt="Wallflower" class="imagecoffee">
        <div class="buttons" src="path/to/icon.png" class="play1">
    <button class="musicstart" id="play"><img id="play_icon"  alt=""></button>
    <input type="range" id="range" class="level" value="0" min="0">  
</div>
</div>




    

        <!--GUIDED IMAGERY  -->
        <div class="text-container">
        <h3 class="title HS"><img src="media/icons/phonecheck.svg" alt="guide" class="guide"> <?php echo $category?></h3>
            <p class="description BM"><?php echo $article['description']?></p>
            
        
            <a href="affirmations.php"> 
            <button class="learn-more-button">Learn More</button></a>
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
.musicstart {
  width: 5em;
  height: 4em;
  border-width: thin;
  border-radius: 25px;
}


.play1 {
   border-radius: 20px;
}


input[type="range"] {
  accent-color: #506527;
}

.wrapper {
  position: relative;
}
.buttons {
  display: flex;
  width: 100%;
  padding: 25px;
  margin: 35px;
  text-align: center;
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
  background: #506527;
  box-shadow: 2px 2px 5px #506527, -2px -2px 11px #fff;
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
    width: 23px; /* Adjust the width of the icon as needed */
    height: auto; /* Maintain aspect ratio */
    margin-right: 6px; /* Adjust the spacing between the icon and text as needed */
}

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    max-width: 600px;
}

.imagecoffee {
    width: 100%;
    height: 329px;
    margin-bottom: 20px;
    border-radius: 12px;

}

.play-button {
    background-color: #4CAF50;
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
    width: 355px;
    min-width: 280px;
    max-width: 560px;
    flex-direction: column;
    align-items: flex-end;
    border: 1px solid var(--Schemes-Primary, #506527);
    border-radius:12px;
    height: 280px;
    margin-bottom: 6em;
}

.title {
    text-align: left;
    margin-right: 1.8em;
    margin-top: 40px;
}

.description {
    margin-bottom: 20px;
    margin: 30px;
}

.learn-more-button {
    color: #506527;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    cursor: pointer;
    margin-right: 20px;
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
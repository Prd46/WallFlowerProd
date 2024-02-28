<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Play'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php';

  $query = "SELECT * FROM Puzzles WHERE id = {$_GET['id']}";
  $result = mysqli_query($db_connection, $query);
  if ($result->num_rows > 0) {
      // Get row from results and assign to $user variable;
      $article = mysqli_fetch_assoc($result);
  } else {
      $error_message = 'Puzzle does not exist';
      // redirect_to('/admin/users?error=' . $error_message);
  }
$site_url = site_url();

?>
<main>
<div class="main_label">
    <a href="puzzlelist.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Puzzles</p>
        </a>
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/extension.svg"/>
                <h1 class="main_label_header TL">Puzzles</h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Puzzles'>
                            <input type='hidden' name='colName' value='puzzleSaved'>
                            <input type='hidden' name='redirect' value='/play.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:<?php echo $article['puzzleSaved'];?>' class='icon saveLit' src='media/icons/savedLit.svg'/>
                                </button>
                            </form>


            </div>
            <p class="BM main_label_caption"><?php echo $article['title']?></p>
        </div>

<br>
    <div class="template_image_box">
        <img class="template_image" src="media/puzzle_thumbnails/<?php echo $article['link']?>.jpg">
        </div>
        <div id="board"></div>
        <h2 class="BS flex jccenter">Turns: <span id="turns">0</span></h2>
        <div id="pieces"></div>
    </main>

    <script>
var rows = 5;
var columns = 5;

var currTile;
var otherTile;

var turns = 0;

window.onload = function() {
    //initialize the 5x5 board
    for (let r = 0; r < rows; r++) {
        for (let c = 0; c < columns; c++) {
            //<img>
            let tile = document.createElement("img");
            tile.src = "./media/puzzleImages/blank.jpg";

            //DRAG FUNCTIONALITY
            tile.addEventListener("dragstart", dragStart); //click on image to drag
            tile.addEventListener("dragover", dragOver);   //drag an image
            tile.addEventListener("dragenter", dragEnter); //dragging an image into another one
            tile.addEventListener("dragleave", dragLeave); //dragging an image away from another one
            tile.addEventListener("drop", dragDrop);       //drop an image onto another one
            tile.addEventListener("dragend", dragEnd);      //after you completed dragDrop

            document.getElementById("board").append(tile);
        }
    }

    //pieces
    let pieces = [];
    for (let i=1; i <= rows*columns; i++) {
        pieces.push(i.toString()); //put "1" to "25" into the array (puzzle images names)
    }
    pieces.reverse();
    for (let i =0; i < pieces.length; i++) {
        let j = Math.floor(Math.random() * pieces.length);

        //swap
        let tmp = pieces[i];
        pieces[i] = pieces[j];
        pieces[j] = tmp;
    }

    for (let i = 0; i < pieces.length; i++) {
        let tile = document.createElement("img");
        tile.src = "./media/puzzle_pieces/<?php echo $article['link']?>/" + pieces[i] + ".png";

        //DRAG FUNCTIONALITY
        tile.addEventListener("dragstart", dragStart); //click on image to drag
        tile.addEventListener("dragover", dragOver);   //drag an image
        tile.addEventListener("dragenter", dragEnter); //dragging an image into another one
        tile.addEventListener("dragleave", dragLeave); //dragging an image away from another one
        tile.addEventListener("drop", dragDrop);       //drop an image onto another one
        tile.addEventListener("dragend", dragEnd);      //after you completed dragDrop

        document.getElementById("pieces").append(tile);
    }
}

//DRAG TILES
function dragStart() {
    currTile = this; //this refers to image that was clicked on for dragging
}

function dragOver(e) {
    e.preventDefault();
}

function dragEnter(e) {
    e.preventDefault();
}

function dragLeave() {

}

function dragDrop() {
    otherTile = this; //this refers to image that is being dropped on
}

function dragEnd() {
    if (currTile.src.includes("blank")) {
        return;
    }
    let currImg = currTile.src;
    let otherImg = otherTile.src;
    currTile.src = otherImg;
    otherTile.src = currImg;

    turns += 1;
    document.getElementById("turns").innerText = turns;
}


    </script>
<style>
#board{
    width: 310px;
    height: 290px;
    padding-bottom: 1rem;
    /* background: url('media/puzzle_thumbnails/<?php echo $article['link']?>.jpg'); */
}
#pieces{
    width: 310px;
    height: 290px;
   margin: 0 auto;
}
.template_image_box{
    width: 100%;
    height: 290px;
    position: absolute;
    display: flex;
    justify-content: center;
    left: 0;
    pointer-events: none;
}
.template_image{
    opacity: 20%;
   
    margin: 0 auto;
    left: 20%;
    width: 290px;
    height: 300px;
    pointer-events: none;
}
</style>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
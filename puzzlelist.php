<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Puzzle List'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
  
?>


<main>


<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/puzzles.svg"/>
                <h1 class="main_label_header TL">Puzzles</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some puzzles to help you unwind, destress, and focus
            </p>
        </div>


<button id="animal-button" class="toggle-button"><img src="media/checkmark.svg" alt="Unchecked" class="icon1 hide">
        Animal
    </button>
    <button id="art-button" class="toggle-button"><img src="media/checkmark.svg" alt="Unchecked" class="icon1 hide">
        Art
    </button>
    <button id="nature-button" class="toggle-button"><img src="media/checkmark.svg" alt="Unchecked" class="icon1 hide">
        Nature
    </button>

<br><br>
             <!-- ONE LEAF CARD -->
             <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/puzzle_thumbnail/Animal4.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Kittens</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                            <img class="icon-1" src="media/icons/bookmark.svg">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->
 <!-- ONE LEAF CARD -->
 <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/puzzle_thumbnail/Animal7.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Hedgehog</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                            <img class="icon-2" src="media/icons/bookmark.svg">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->
 <!-- ONE LEAF CARD -->
 <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/puzzle_thumbnail/Animal1.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Butterfly</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                            <img class="icon-3" src="media/icons/bookmark.svg">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->
         <!-- ONE LEAF CARD -->
         <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/puzzle_thumbnail/Art2.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Sunflower</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                            <img class="icon-4" src="media/icons/bookmark.svg">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->
 <!-- ONE LEAF CARD -->
 <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/puzzle_thumbnail/Art4.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Great Wave</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                            <img class="icon-5" src="media/icons/bookmark.svg">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->
         <!-- ONE LEAF CARD -->
         <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/puzzle_thumbnail/Art1.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Starry Night</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                            <img class="icon-6" src="media/icons/bookmark.svg">
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->
<br><br>
</main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>

<script>
const animalButton = document.getElementById('animal-button');
    const artButton = document.getElementById('art-button');
    const natureButton = document.getElementById('nature-button');

    const animalIcon = animalButton.querySelector('.icon1');
    const artIcon = artButton.querySelector('.icon1');
    const natureIcon = natureButton.querySelector('.icon1');

    const animalText = animalButton.querySelector('.toggle-text');
    const artText = artButton.querySelector('.toggle-text');
    const natureText = natureButton.querySelector('.toggle-text');

    animalButton.addEventListener('click', () => {
        if (animalIcon.classList.contains('hide')) {
            animalIcon.classList.remove('hide');
            animalText.innerText = 'Animal (Selected)';
            animalButton.style.backgroundColor = 'white';
            animalButton.style.color = '#D2EC9F';
        } else {
            animalIcon.classList.add('hide');
            animalText.innerText = 'Animal';
            animalButton.style.backgroundColor = '#D2EC9F';
            animalButton.style.color = '#D2EC9F';
        }
    });

    artButton.addEventListener('click', () => {
        if (artIcon.classList.contains('hide')) {
            artIcon.classList.remove('hide');
            artText.innerText = 'Art (Selected)';
            artButton.style.backgroundColor = '#D2EC9F';
            artButton.style.color = '#D2EC9F';
        } else {
            artIcon.classList.add('hide');
            artText.innerText = 'Art';
            artButton.style.backgroundColor = '#D2EC9F';
            artButton.style.color = '#D2EC9F';
        }
    });

    natureButton.addEventListener('click', () => {
        if (natureIcon.classList.contains('hide')) {
            natureIcon.classList.remove('hide');
            natureText.innerText = 'Nature (Selected)';
            natureButton.style.backgroundColor = '#D2EC9F';
            natureButton.style.color = '#D2EC9F';
        } else {
            natureIcon.classList.add('hide');
            natureText.innerText = 'Nature';
            natureButton.style.backgroundColor = '#D2EC9F';
            natureButton.style.color = '#D2EC9F';
        }
    });




    
</script>

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
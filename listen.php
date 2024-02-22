<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Sounds'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<div class="header_menu_vine">
</div>

<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/headphones.svg"/>
                <h1 class="main_label_header TL">Sounds</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some soothing sounds, music samples, and audio tracks that can help create a nice and calming atmosphere.
            </p>
 
            <br><br>
             <!-- ONE LEAF CARD -->
        <a href="coffeesound.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/sound_img/coffe_shop.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Coffee Shop</h3>
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
 <a href="coffeesound.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/sound_img/sittinginpark.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Sitting in Park</h3>
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
 <a href="coffeesound.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/sound_img/rainyday.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Rainy Day</h3>
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
 <a href="coffeesound.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/sound_img/lofi-beats.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Lofi Beats</h3>
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


        
        </div>
</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>

<style>

.icon-1 {
    margin-left: 113px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-2 {
    margin-left: 95px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-3 {
    margin-left: 135px; /* Adjust the spacing between the button and the bookmark icon */
    margin-bottom: 15px;
    cursor: pointer; /* Change cursor to pointer to indicate it's clickable */
    width: 25px;
}
.icon-4 {
    margin-left: 135px; /* Adjust the spacing between the button and the bookmark icon */
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

<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Breathe'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<main>

<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/blackPhone.svg"/>
                <h1 class="main_label_header TL">S.O.S</h1>
            </div>
            <p class="BM main_label_caption">
            We all need extra help sometimes. Stay calm and take a deep breath.
            </p>
        </div>
     
        <div class="main_label_header">
                <h1 class="main_label_header TL quo">Hotlines</h1>
            </div>
            <div class="freeblock">
            <h3 class="font_center">Hotline One</h3>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="phone">911</a>
            </div>

            <div class="freeblock">
            <h3 class="font_center">Hotline Two</h3>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="phone">911</a>
            </div>

            <div class="freeblock">
            <h3 class="font_center">Hotline Three</h3>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="phone">911</a>
            </div>

            <br>

            

 <!-- ONE LEAF CARD -->
 <a href="affirmations.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_2" src="media/icons/air.svg"/>
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

        <!-- ONE LEAF CARD -->
 <a href="affirmations.php">
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

<!-- ONE LEAF CARD -->
<a href="affirmations.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_2" src="media/icons/lightbulb.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Lofi Beats</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- END OF LEAF CARD -->


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
.leaf_icon_2{
    width: 40px;
    height: 40px;
    border-top-left-radius: 12px;
    border-bottom-right-radius: 12px;
}
h3 {
text-align: center;
font-size:  16px;
font-weight: 600;
}

.freeblock {
  text-align: center;
}

.phone {
  color: #FF0000;
  font-size: 18px;
}


</style>
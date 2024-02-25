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
            <h3 class="font_center">Crisis Text Line</h3>
            <p class="BS">A live, trained Crisis Counselor receives the text and responds, all from a secure online platform. The Counselor will help you move from a hot moment to a cool moment.</p>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="phone">Text HOME to 741741</a>
            </div>

            <div class="freeblock">
            <h3 class="font_center">Need2Text</h3>
            <p class="BS">Immediately be put into contact with a master’s-level counselor. Divulge optional personal info, then chat about what's going on.</p>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="phone">Text TALK to 38255</a>
            </div>

            <div class="freeblock">
            <h3 class="font_center">SAMHSA's National Helpline</h3>
            <p class="BS"> A confidential, free, 24/7 information service in English and Spanish for individuals and family members facing mental and/or substance use disorders. </p>
            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="phone">1-800-662-4357</a>
            </div>

            <br>

            

 <!-- ONE LEAF CARD -->
 <a href="breathe.php">
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
 <a href="listen.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon_1" src="media/sound_img/lofi-beats.jpg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Sounds</h3>
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
                            <h3 class="TS">Affirmations</h3>
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
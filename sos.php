<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'SOS'; // Gives a value if page name is missing
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
                <h1 class="main_label_header TL">Hotlines</h1>
            </div>
            <p class="emergency BS">If you believe you are experiencing a medical emergency please call 911 (or your local medical emergency number).</p>
            <div class="freeblock">
            <h3 class="font_center TM">Crisis Text Line</h3>
            <p class="BS">A live, trained Crisis Counselor receives the text and responds, all from a secure online platform. The Counselor will help you move from a hot moment to a cool moment.</p>
            <p class="phone BS">Text HOME to 741741</p>
            </div>
            <a href="meditations.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/meditation.svg"/>
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
            <div class="freeblock">
            <h3 class="font_center TM">Need2Text</h3>
            <p class="BS">Immediately be put into contact with a master’s-level counselor. Divulge optional personal info, then chat about what's going on.</p>
            <p class="phone BS">Text TALK to 38255</p>
            </div>
            <a href='listen.php'>
            <div class='leaf_card flex aicenter'>
                <div class='leaf_card_image'>
                    <img class='icon leaf_icon' src='media/icons/headphones.svg'/>
                </div>

                    <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>Sounds</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>For when you need to relax.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
            <div class="freeblock">
            <h3 class="font_center TM">SAMHSA's National Helpline</h3>
            <p class="BS"> A confidential, free, 24/7 information service in English and Spanish for individuals and family members facing mental and/or substance use disorders. </p>
            <p class="phone BS">1-800-662-4357</p>
            </div>
            <a href='affirmations.php'>
            <div class='leaf_card flex aicenter'>
                <div class='leaf_card_image'>
                    <img class='icon leaf_icon' src='media/icons/affirmationNew.svg'/>
                </div>

                    <div class='leaf_card_text'>
                        <div class='leaf_card_title'>
                            <h3 class='TS'>Affirmations</h3>
                        </div>
                        <div class='leaf_card_caption'>
                            <p class='BS'>For when you need inspiration.</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
            <br>



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
.emergency{
    color: darkred;
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
text-align: left;
font-size:  16px;
font-weight: 600;
}

.freeblock {
    margin: 0;
    margin-bottom: 5px;
}

p.phone {
  color: #006970 !important;
  font-size: 16px;
  display: flex;
}

</style>
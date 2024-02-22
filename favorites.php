<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Saved'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/blackbookmark.svg"/>
                <h1 class="main_label_header TL">Saved</h1>
            </div>
            <p class="BM main_label_caption">
            Here's a list of all your saved affirmations, icebreakers, audios, and more.
            </p>
        </div>
</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
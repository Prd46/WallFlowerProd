<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Meditations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/air.svg"/>
                <h1 class="main_label_header TL">Meditations</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some rhythmic breathing exercises to help you calm down and clear your mind.
            </p>
        </div>
</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
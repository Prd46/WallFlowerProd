<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Articles'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/newsmode.svg"/>
                <h1 class="main_label_header TL">Articles</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some advice articles to help better understand and manage feelings of social anxiety.
            </p>
        </div>
</main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
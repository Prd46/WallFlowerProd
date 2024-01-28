<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Home'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<main>
        <div class="index_main_widget">
            <div class="index_main_widget_header">
                <img class="icon" src="~"/>
                <h3 class="index_main_widget_heading TS">Daily Affirmation</h3>
            </div>
            <div class="index_main_widget_content BS">I am loved and worthy</div>
        </div>
        <div class="index_main_pageButtons">
            <a href="reflectHome.html">
                <div class="index_main_pageButton">Reflect</div>
            </a>
            <a href="relaxHome.html">
                <div class="index_main_pageButton">Relax</div>
            </a>
            <a href="inspireHome.html">
                <div class="index_main_pageButton">Inspire</div>
            </a>
            <a href="playHome.html">
                <div class="index_main_pageButton">Play</div>
            </a>
        </div>
    </main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>
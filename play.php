<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Play'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>

<script src="scripts/puzzle.js"></script>
<br>
    <div id="board"></div>
        <h2 class="BS flex jccenter">Turns: <span id="turns">0</span></h2>
        <div id="pieces"></div>
    </main>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
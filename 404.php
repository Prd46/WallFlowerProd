<?php 
    include_once __DIR__ . '/connection.php';
    $page_name = 'Home'; // Gives a value if page name is missing
    include_once __DIR__ . '/components/header.php'
?>
<main>
    <div class="p404">
        <h3 class="TM C">Sorry, the page you're looking for does not exist!</h3>
        <div class="LL p404Button" onclick="history.back()">Go Back</div>
    </div>
</main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>
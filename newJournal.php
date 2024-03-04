<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'New Journal'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<?php
// get users data from database
$query = 'SELECT * FROM JournalEntries';
$result = mysqli_query($db_connection, $query);

?>

<main>
<a href="journal.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Journal</p>
        </a>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/edit.svg"/>
                <h1 class="main_label_header TL">New Entry</h1>
            </div>
            <p class="BM main_label_caption">
            Write how you feel.
            </p>
        </div>

    <form class="journal_box" action="includes/process_posts.php" method="POST">
    <!-- <label for="emojiPath">Emoji</label>
    <input class="journal_emoji" type="text" id="emojiPath" name="emojiPath"> -->
    <label for="title">Title</label>
    <input class="journal_title" type="text" id="title" name="title"> 
    <label for="title">Text</label> 
    <textarea class="journal_text" type="text" id="entryText" name="entryText"></textarea>
    <input type="submit" value="submit" class="editSubmit">
    </form>
</main>
<script src="scripts/app.js"></script>
<?php include "components/footer.php" ?>
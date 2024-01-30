<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Breathe'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<?php
// get users data from database
$query = 'SELECT * FROM JournalEntries';
$result = mysqli_query($db_connection, $query);

?>
<main>
    <form action="includes/process_posts.php" method="POST">

    <input class="journal_emoji" type="text" id="emojiPath" name="emojiPath"><label for="emojiPath">Emoji</label>
    <input class="journal_title" type="text" id="title" name="title"><label for="title">Title</label> 
    <!-- <input class="journal_text" type="text" id="entryText" name="entryText"><label for="title">Text</label>  -->
    <div class="journal_text_area">
        <label for="entryText">Enter Text Here</label>
                <br>
                <textarea class="journalText js-tinymce" name="entryText" id="entryText" cols="30"
                  rows="10"></textarea>
    </div>
    <input type="submit" value="submit" class="editSubmit">
    </form>
</main>
<script src="scripts/app.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>
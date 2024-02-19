<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Article Details'; // Gives a value if page name is missing
  include "components/header.php" 
?>
<?php
// get users data from database
$query = "SELECT * FROM JournalEntries WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $entry = mysqli_fetch_assoc($result);
} else {
    $error_message = 'User does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}

?>
<main>
<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/edit.svg"/>
                <h1 class="main_label_header TL">Read/Write</h1>
            </div>
        </div>
<a href="journal.php"><- Return</a>
    <form class="journal_box" action="<?php echo site_url(); ?>/includes/edit_post.php" method="POST">

    <input class="journal_emoji" type="text" id="emojiPath" name="emojiPath" value="<?php echo $entry['emojiPath']?>"><label for="emojiPath">Emoji</label>
    <input class="journal_title" type="text" id="title" name="title" value="<?php echo $entry['title']?>"><label for="title">Title</label> 
    <textarea class="journal_text" type="text" id="entryText" name="entryText"><?php echo $entry['entryText']?></textarea><label for="title">Text</label> 
    <input type="submit" value="submit" class="editSubmit">
    <input type="hidden" name="EntryDate" value="<?php echo $entry['EntryDate']?>">
    <input type="hidden" name="id" value="<?php echo $entry['id']?>">
    </form>
    <div class="journal_delete_button js-delete">
    <h3 class="TS">Delete Entry</h3>
    </div>

    <div class="delete_confirmation js-confirm hidden">
      <h3 class="TS">Are you sure you want to delete your entry: <?php echo $entry['title']?> ?</h3>
      <a href="/includes/deleteJournal.php?id=<?php echo $entry['id']?>">
        <h3 class="TS">Yes</h3>
      </a>
      <div class="confirmation_button_no js-cancel">
        <h3 class="TS">No</h3>
      </div>
    </div>
  </main>
  <script src="scripts/deleteJournal.js"></script>
<?php include "components/footer.php" ?>
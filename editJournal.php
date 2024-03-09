<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Edit Journal'; // Gives a value if page name is missing
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
$site_url = site_url();

?>
<a href="journal.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt="image">
        <p class=" BS label_back_text">Journal</p>
        </a>
<main>

<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/edit.svg" alt="image">
                <h1 class="main_label_header TL">Edit Entry</h1>
            </div>
        </div>
    <form class="journal_box" action="<?php echo site_url(); ?>/includes/edit_post.php" method="POST">
    <div class="input_container">
      <label for="title">Title</label> 
      <input class="journal_title" type="text" id="title" name="title" value="<?php echo $entry['title']?>">
    </div>
    <!-- <div class="input_container">
      <label for="emojiPath">Mood</label>
      <input class="journal_emoji" type="text" id="emojiPath" name="emojiPath" value="">
    </div> -->
    <div class="input_container">
      <label for="title">Text</label> 
      <textarea class="journal_text" type="text" id="entryText" name="entryText"><?php echo $entry['entryText']?></textarea>
</div>
<div class="editButtonBar">
  <a class="editDeleteSubmitDelete" onclick="return confirm('Are you sure you want to delete this journal entry?')" href="<?php echo $site_url?>/includes/deleteJournal.php?id=<?php echo $entry['id']?>">
      <img src="/media/icons/trash.svg" style="width:16px; padding-right:12px;" class="icon" alt="image">
      <h3 class="LL" style="color:#ba1b1a;">Delete</h3>
  </a>
    <input type="submit" value="Submit" class="editDeleteSubmit LL">
    <input type="hidden" name="EntryDate" value="<?php echo $entry['EntryDate']?>">
    <input type="hidden" name="id" value="<?php echo $entry['id']?>">
</div>

    </form>

  
  </main>
  <script src="scripts/deleteJournal.js"></script>
<?php include "components/footer.php" ?>
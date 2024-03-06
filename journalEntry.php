<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Journal Entry'; // Gives a value if page name is missing
  include "components/header.php";
?>
<?php
// get users data from database
$query = "SELECT * FROM JournalEntries WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
$site_url = site_url();



if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $article = mysqli_fetch_assoc($result);
} else {
    $error_message = 'User does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}
$site_url = site_url();
?>
<a href="journal.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Journal</p>
        </a>
<main>
<!-- THIS IS THE RETURN HTML -->
<div class="main_label">

            <div class="main_label_header">
                <h1 class="main_label_header TL"><?php echo $article['title']?></h1>

            </div>
</div>
            <p class="BM main_label_caption"></p>
        </div>
  <div class="breakdown">
    <p class="BS" style="line-height:1.75rem;">
    <?php echo $article['entryText']?>
    </p>
  </div>

<br></br>
</main>
<a class="journalED" href='<?php echo $site_url ?>/editJournal.php?id=<?php echo $_GET['id']?>'>
  <img class="icon" src="media/icons/edit.svg">
</a>
<?php include "components/footer.php" ?>


<style>

.source, .breakdown {
  font-family: "DM Sans";
  font-size: 16px; /* Example font size */
  font-style: normal;
  font-weight: 400; /* Example font weight */
  line-height: 24px; /* Example line height */
  letter-spacing: 0.5px; /* Example letter spacing */
}
.source{
  color: var(--t40);
  text-decoration: underline;
}
.breakdown {
  background-color: var(--OffWhite);
  border-radius: 16px;
  padding: .5rem 1rem;
  -ms-word-break: break-all;
  word-break: break-all;

  /* Non standard for WebKit */
  word-break: break-word;

-webkit-hyphens: auto;
-moz-hyphens: auto;
     hyphens: auto;
}


.con1 {
  display: flex; /* Use flexbox */
  align-items: center; /* Align items vertically */
  margin-bottom: 13px;
}


.con {
  display: inline-block; /* Ensures container size fits its content */
}

.link {
  display: flex; /* Use flexbox */
  align-items: center; /* Vertically center content */
  text-decoration: none; /* Remove default link underline */
}

</style>
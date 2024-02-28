<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Article Details'; // Gives a value if page name is missing
  include "components/header.php";
?>
<?php
// get users data from database
$query = "SELECT * FROM Articles WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $article = mysqli_fetch_assoc($result);
} else {
    $error_message = 'User does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}
$site_url = site_url();
?>
<main>
<!-- THIS IS THE RETURN HTML -->
<div class="main_label">
<a href="articles.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Articles</p>
        </a>
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/newsmode.svg"/>
                <h1 class="main_label_header TL">Articles</h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Articles'>
                            <input type='hidden' name='colName' value='aricleSaved'>
                            <input type='hidden' name='redirect' value='/article.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:<?php echo $article['articleSaved'];?>' class='icon saveLit' src='media/icons/savedLit.svg'/>
                                </button>
                            </form>


            </div>
</div>
            <p class="BM main_label_caption"><?php echo $article['Title']?></p>
        </div>
<!-- THIS IS THE ARTICLE TEXT PARAGRAPHS -->
<a class="TS" href="<?php echo $article['Link']?>" target="_blank">
  <div class="source LM"><p class="TS"><?php echo $article['Source']?></p>
</div>
</a>

  <div class="breakdown">
    <p class="BS" style="line-height:1.75rem;">
    <?php echo $article['Breakdown']?>
    </p>
  </div>

<br></br>
  </main>

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
  margin: 25px;
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
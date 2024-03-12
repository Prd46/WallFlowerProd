<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Article Details'; // Gives a value if page name is missing
  include "components/header.php";
?>
<?php
// get users data from database
$query = "SELECT * FROM Articles WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);


$query2 = "SELECT * FROM users WHERE item_id = {$_GET['id']} AND user_id = '{$user['user_id']}' AND item_category='Articles'";
$result2 = mysqli_query($db_connection, $query2);
$row = "0";

if ($result2->num_rows > 0) {
  // Get row from results and assign to $user variable;
  $row = mysqli_fetch_assoc($result2);
  $seen = true;
}else{
  // echo "not seen";
  $seen = false;
}


if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $article = mysqli_fetch_assoc($result);
} else {
    $error_message = 'User does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}
$site_url = site_url();
?>
<a href="articles.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt="image">
        <p class=" BS label_back_text">Articles</p>
        </a>
<main>
<!-- THIS IS THE RETURN HTML -->
<div class="main_label">

            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/newsmode.svg" alt="image">
                <h1 class="main_label_header TL">Articles</h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Articles'>
                            <input type='hidden' name='redirect' value='/article.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg' alt="image">
                                        <img style='opacity:0;opacity:<?php if($seen){echo $row['saved_status'];}?>' class='icon saveLit' src='media/icons/savedLit.svg' alt="image">
                                </button>
                            </form>


            </div>
</div>
            <p class="BSH main_label_caption"><?php echo $article['Title']?></p>
<!-- THIS IS THE ARTICLE TEXT PARAGRAPHS -->
<a class="TS" href="<?php echo $article['Link']?>" target="_blank">
  <div class="source"><p class="LL"><?php echo $article['Source']?></p>
</div>
</a>

  <div class="breakdown">
    <p class="BS" style="line-height:1.75rem;">
    <?php echo $article['Breakdown']?>
    </p>
  </div>

<br>
  </main>

<?php include "components/footer.php" ?>
<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Meditation'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php';

$query = "SELECT * FROM Meditations WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);

$query2 = "SELECT * FROM users WHERE item_id = {$_GET['id']} AND user_id = '{$user['user_id']}' AND item_category='Meditations'";
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
    $error_message = 'Meditation does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}
$site_url = site_url();
?>
<a href="meditations.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg" alt='image'>
        <p class=" BS label_back_text">Meditations</p>
        </a>
<main>
<div class="main_label">

            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/meditation.svg" alt='image'>
                <h1 class="main_label_header TL"><?php echo $article['meditationName']?></h1>


                <form class='save_button_container'  id='saveButton' method='post' action='<?php echo $site_url?>/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='<?php echo $article['id'];?>'>

                            <input type='hidden' name='dbName' value='Meditations'>
                            <input type='hidden' name='redirect' value='/meditation.php?id=<?php echo $article['id'];?>'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg' alt='image'>
                                        <img style='opacity:0;opacity:<?php if($seen){echo $row['saved_status'];}?>' class='icon saveLit' src='media/icons/savedLit.svg' alt='image'>
                                </button>
                            </form>


            </div>
            <!-- <p class="BM main_label_caption"></p> -->
        </div>

<br>

<?php $firstCycle = 1?>
<div class="iframe_div">
<?php 
$url = $article['link'];
echo"
<iframe width='100%' 
height='300' 
src='$url' 
title='YouTube video player' 
allow='accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' 
allowfullscreen></iframe>"
?>
</div>
<br>

<div class="breakdown">
    <p class="BS" style="line-height:1.75rem;">
    <?php echo $article['text']?>
    </p>
  </div>
  

</main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>

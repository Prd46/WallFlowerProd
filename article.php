<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Article Details'; // Gives a value if page name is missing
  include "components/header.php" 
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

?>
<main>
<!-- THIS IS THE RETURN HTML -->
<div class="con">
  <a href="articles.php" class="link">
    <img class="icon main_label_icon" src="media/icons/arrow_back.svg" alt="Back Arrow"/>
    <p class="flexis">Articles</p>
  </a>
</div>
  <br> <br>

<!-- THIS IS THE TITLE AND ICON  -->
  <div class="con1">
  <img class="icon main_label_icon" src="media/icons/newsmode.svg" alt="News Mode Icon"/>
  <div class="title"><?php echo $article['Title']?></div>
</div>
 
<!-- THIS IS THE ARTICLE TEXT PARAGRAPHS -->
  <div class="source"><?php echo $article['Source']?></div>
  <div class="breakdown"><?php echo $article['Breakdown']?></div>

  <a href="<?php echo $article['Link']?>" target="_blank">
  View Original Article
  </a>

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
.breakdown {
  margin: 25px;
}


.con1 {
  display: flex; /* Use flexbox */
  align-items: center; /* Align items vertically */
  margin-bottom: 13px;
}

.icon {
  margin-right: 5px; /* Adjust spacing between icon and title */
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
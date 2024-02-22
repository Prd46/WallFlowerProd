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
  <a href="articles.php"><- Return</a>
  <div class=""><?php echo $article['Title']?></div>
  <div class=""><?php echo $article['Source']?></div>
  <div class=""><?php echo $article['Breakdown']?></div>
  <a href="<?php echo $article['Link']?>" target="_blank">
  View Original Article
  </a>
  </main>
<?php include "components/footer.php" ?>
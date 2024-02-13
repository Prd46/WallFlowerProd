<?php 
   include_once __DIR__ .'/connection.php'; 
  $page_name = 'Recipe Details'; // Gives a value if page name is missing
  include "components/header.php" 
?>
<?php
// get users data from database
$query = "SELECT * FROM recipes WHERE id = {$_GET['id']}";
$result = mysqli_query($db_connection, $query);
if ($result->num_rows > 0) {
    // Get row from results and assign to $user variable;
    $recipe = mysqli_fetch_assoc($result);
} else {
    $error_message = 'User does not exist';
    // redirect_to('/admin/users?error=' . $error_message);
}

?>
<main>
  <a class="returnLink" href="<?php echo site_url(); ?>/search.php">← Return</a>
    <div class="recipeCard">
      <img class="detailsFeatured" alt="Featured Image" src="<?php echo site_url(); ?>/media/<?php echo $recipe['image_path']?>.jpg">
      <div class="recipeInfo">
        <h2 class="recipeLine"><?php echo $recipe['title']?></h2>
        <h2 class="recipeLine"><?php echo $recipe['prepTime']?></h2>
        <h2 class="recipeLine"><?php echo $recipe['rating']?></h2>
      </div>
    </div>

    <div class="recipeIngredients">
        <h2 class="recipeSectionTitle">Ingredients</h2>
        <div class="recipeIngredientsContent"><?php echo $recipe['ingredients']?></div>
    </div>

    <div class="recipeInstructions">
        <h2 class="recipeSectionTitle">Steps</h2>
        <div class="recipeIngredientsContent"><?php echo $recipe['steps']?></div>
    </div>
    <input type="hidden" name="id" value="<?php echo $recipe['id']?>">
  </main>
<?php include "components/footer.php" ?>
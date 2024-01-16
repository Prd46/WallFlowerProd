<?php

include_once __DIR__ . '/../connection.php';

if (!$_POST) {
    die('Unauthorized action');
}


// defining values in the edit
$image_value = sanitize_value($_POST['image_path']);
$title_value = sanitize_value($_POST['title']);
$prepTime_value = sanitize_value($_POST['prepTime']);
$rating_value = sanitize_value($_POST['rating']);
$ingredients_value = sanitize_value($_POST['ingredients']);
$steps_value = sanitize_value($_POST['steps']);
$id_value = sanitize_value($_POST['id']);

// edits the database value for each item
$query = "UPDATE recipes SET image_path = '{$image_value}', title = '{$title_value}', prepTime = '{$prepTime_value}', rating = '{$rating_value}', ingredients = '{$ingredients_value}', steps = '{$steps_value}' WHERE id = {$id_value}";

// Run the SQL statement
$result = mysqli_query($db_connection, $query);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/allRecipes.php');
} else {
    $error_message = 'Sorry there was an error creating the recipe';
    echo $error_message;
}

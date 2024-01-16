<?php
/**
 * 
 */
function get_recipes()
{
    global $db_connection;
    $query = 'SELECT * FROM recipes';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

/**
 * Insert a services into the database
 * @param  string $name - service name of the service
 * @param  string $description - service description of the service
 * @param  string $price - service price of the service
 * @return object - mysqli_result
 */
function add_recipe($image, $title, $prepTime, $rating, $ingredients, $steps)
{
    global $db_connection;
    $query = 'INSERT INTO recipes';
    $query .= ' (image_path, title, prepTime, rating, ingredients, steps)';
    $query .= " VALUES ('$image', '$title', '$prepTime', '$rating', '$ingredients', '$steps')";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_recipe_by_id($id)
{
    global $db_connection;
    $query = "SELECT * FROM recipes WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    if ($result->num_rows > 0) {
        $recipe = mysqli_fetch_assoc($result);
        return $recipe;
    } else {
        return false;
    }
}

function edit_recipe($image, $title, $prepTime, $rating, $ingredients, $steps)
{
    global $db_connection;
    $query = 'UPDATE recipes';
    $query .= " SET image = '{$image}', title = '{$title}', prepTime = '{$prepTime}', rating = '{$rating}', ingredients = '{$ingredients}', steps = '{$steps}',";
    $query .= " WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function delete_recipe_by_id($id)
{
    global $db_connection;
    $query = "DELETE FROM recipes WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    return $result;
}
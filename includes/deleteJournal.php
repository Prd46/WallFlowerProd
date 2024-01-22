
<?php
include_once __DIR__ . '/../connection.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die('ID is needed in URL');
}

$result = delete_journal_by_id($id);

// Check there are no errors with our SQL statement
if ($result) {
    redirect_to('/reflectHome.php');
} else {
    $error_message = 'Could Not Delete Service: ' . mysqli_error($db_connection);
    echo $error_message;
}
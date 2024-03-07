<?php
/**
 * 
 */
// THIS IS WHERE WE WRITE THE SQL FUNCTIONS TO GET DATABASE INFORMATION.
setcookie('inside', 'inside', time() + (86400 * 30), "/", ".pauldigerolamo.com"); // 86400 = 1 day
function get_journals()
{
    global $db_connection;
    $query = 'SELECT * FROM recipes';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_affirmations()
{
    global $db_connection;
    $query = 'SELECT * FROM Affirmations';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_conversationStarters()
{
    global $db_connection;
    $query = 'SELECT * FROM ConversationStarters';
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_articles()
{
    global $db_connection;
    $query = 'SELECT * FROM Articles';
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
function add_journal($journalUID, $title, $entryText)
{
    global $db_connection;
    $query = 'INSERT INTO JournalEntries';
    $query .= ' (user_id, title, entryText)';
    $query .= " VALUES ('$journalUID', '$title', '$entryText')";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function get_journal_by_id($id)
{
    global $db_connection;
    $query = "SELECT * FROM JournalEntries WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    if ($result->num_rows > 0) {
        $journalEntry = mysqli_fetch_assoc($result);
        return $journalEntry;
    } else {
        return false;
    }
}

function edit_journal($id, $emojiPath, $title, $entryText)
{
    global $db_connection;
    $query = 'UPDATE JournalEntries';
    $query .= " SET emojiPath = '{$emojiPath}', title = '{$title}', entryText = '{$entryText}'";
    $query .= " WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    return $result;
}

function delete_journal_by_id($id)
{
    global $db_connection;
    $query = "DELETE FROM JournalEntries WHERE id = $id";
    $result = mysqli_query($db_connection, $query);
    return $result;
}
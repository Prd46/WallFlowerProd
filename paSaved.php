<?php include_once __DIR__ . '/connection.php';
?>

 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Favorites</title>
</head>
<body>
    <header>
        <div class="header_image_box">
            <a href="index.html">
                <div class="header_backButton">
                    <img class="header_backButtonImage" src="~"/>
                </div>
            </a>
            <img class="header_image" src="~"/>
        </div>
    </header>
    <main>
        <div class="affirmations_main_label">
            <h1 class="affirmations_main_label_header">Affirmations</h1>
        </div>
        <div class="affirmations_main_content">
            
<?php
                  if (!$affirmations) {
                    echo '<p>No results found</p>';
                }

        if ($affirmations){
                    while ($affirmation = mysqli_fetch_array($affirmations)) {
                        echo "
                        <div class='saved_listing'>
                        <p class=''>{$affirmation['affirmation']}</p>
                        </div>";
                      } 
                }

?>
        </div>
    </main>
    <footer>
        <div class="footer_buttons">
            <a href="settings.html">
                <div class="footer_button">
                    <img class="icon" src="~"/>
                    <p class="footer_button_text">Settings</p>
                </div>
            </a>
            <a href="index.html">
                <div class="footer_button">
                    <img class="icon" src="~"/>
                    <p class="footer_button_text">Home</p>
                </div>
            </a>
            <a href="contact.html">
                <div class="footer_button">
                    <img class="icon" src="~"/>
                    <p class="footer_button_text">Contact</p>
                </div>
            </a>   
        </div>
    </footer>
</body>
</html>
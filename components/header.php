
<?php 

if (!isset($page_name)) {
  $page_name = 'Missing Title'; // Gives a value if page name is missing
}

$site_name = 'Wallflower';
$document_title = $page_name . ' | ' . $site_name;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $document_title?></title>
    <link rel="stylesheet" href= "<?php echo site_url(); ?>/css/normalize.css">
    <link rel="stylesheet" href= "<?php echo site_url(); ?>/css/stylesheet.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="<?php echo site_url(); ?>/css/puzzleStyles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="icon" href="<?php echo site_url(); ?>/media/icons/wf_icon.ico">
</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Affirmations</title>
</head>
<body>
    <div class="header_leavesImage">
        <img class="leaves_image" src="media/topImage.png"/>
    </div>
            <header>
            <div class="header_logo">
                        <img src="media/icons/logo.svg"/>
                    </div>
                    <!-- <div class="header_menu_button_container">
                        <div class="header_menu_button js-menu-button round">
                            <img class="js-menu_icon icon" src="media/icons/menu.svg"/>
                            <img class="js-x_icon icon hidden" src="media/icons/x.svg"/>
                        </div>
                    </div> -->
                    <div class="hamburger_menu js-menu flex jccenter hidden">
                        <div class="menu_listings flex column">
                                <div class="menu_listing">
                                    <a href="affirmations.php"><h1 class="BM menu_text">Affirmations</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="conversationStarters.php"><h1 class="BM menu_text">Icebreakers</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="listen.php"><h1 class="BM menu_text">Sounds</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="breathe.php"><h1 class="BM menu_text">Meditations</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="articles.php"><h1 class="BM menu_text">Articles</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="puzzlelist.php"><h1 class="BM menu_text">Puzzles</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="journal.php"><h1 class="BM menu_text">Journal</h1></a>
                                </div>
                                <div class="menu_hr">

                                </div>
                                <div class="menu_listing">
                                    <a href="favorites.php"><h1 class="BM menu_text">Saved</h1></a>
                                </div>
                                <div class="menu_listing">
                                    <a href="sos.php"><h1 class="BM menu_text">S.O.S</h1></a>
                                </div>
                        </div>
                    </div>
            </header>

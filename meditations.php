<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Meditations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<?php
                // $affirmationText = "I have value.";
                $query = "SELECT Meditations.id, Meditations.meditationName, Meditations.type, users.user_id, users.item_id, users.saved_status FROM Meditations LEFT JOIN users ON Meditations.id=users.item_id AND users.user_id={$user_data['user_id']} AND item_category='Meditations'";
                // $query .= " ORDER BY RAND()";
                // $query .= " LIMIT 1;";
                $site_url = site_url();
                // echo $db_connection;
                // echo $query;  
                $features = mysqli_query($db_connection, $query);

?>
<a href="index.php" class="label_back">
        <img class="label_back_arrow" src="media/icons/back.svg">
        <p class=" BS label_back_text">Explore</p>
        </a>
<main>


<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/meditation.svg"/>
                <h1 class="main_label_header TL">Meditations</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some calming exercises to put your mind at ease.
            </p>
        </div>


        <div class="filterButtons">
        <div class="filterButton js-all LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">All</div></div>
        <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Grounding</div></div>
        <div class="filterButton LM"><img class="check hidden" src="media/icons/check.svg"><img class="uncheck" src="media/icons/unchecked.svg"><div class="js-filter">Breathing</div></div>
            </div>



            <div class="articleListings">
              <?php
            while ($article = mysqli_fetch_array($features)) {
                $aid = $article['user_id'];
              $gid = $user_data['user_id'];
              // echo $aid;
              // echo $gid;

              if (($aid ==  $gid)&&($article['saved_status'])){
                $lit = 1;
              }else{
                $lit = 0;
              }

              $category = str_replace('_', ' ', $article['type']);
                  echo
                  "
                  <a href='{$site_url}/meditation.php?id={$article['id']}' class='{$article['type']} js-dbResult'>
                    <div class='leaf_card flex aicenter'>
                      <div class='leaf_card_image'>
                        <img class='icon leaf_icon' src='media/icons/meditation.svg'/>
                      </div>
                      <div class='leaf_card_text_non_index'>
                        <div class='leaf_card_title'>
                          <h3 class='TS articleTitle'>{$article['meditationName']}</h1>
                          </div>

                          <div class='leaf_card_caption'>
                                <p class='LM'>{$category}</p>
                            </div> 

                            
                        </div>
                        <form class='save_button_container'  id='saveButton' method='post' action='{$site_url}/includes/saveFunction.php'>
                            <input type='hidden' name='id' value='{$article['id']}'>

                            <input type='hidden' name='dbName' value='Meditations'>
                            <input type='hidden' name='redirect' value='/meditations.php'>
                                <button name='toggle' id='toggle' class='affirmations_main_content_button save flex aicenter round'>
                                        <img class='icon saveUnlit bookmark' src='media/icons/affirmationsSave.svg'/>
                                        <img style='opacity:{$lit};' class='icon saveLit' src='media/icons/savedLit.svg'/>
                                </button>
                            </form>
                    </div>
                  </a>

                  
                  ";
                } 
                ?>
            </div>
</main>
<script src="scripts/dropdown.js"></script>
<?php 
  include_once __DIR__ . '/components/footer.php'
?>

<style>

/* .animate {
       margin: 0;
       padding: 0;
       border: 0;
       font-size: 16px;
       text-align: center;
   }
   
   .animate:before {
       content: 'Breath In ...';
       -webkit-animation-name: animate;
       -webkit-animation-duration: 25s;
       animation-name: animate;
       animation-duration: 14s;
       animation-delay: 3s;
       animation-iteration-count: infinite;
   }
   
   @keyframes animate {
    0% {
       content: 'Breath In ...';
   }
   21% {
       content: 'Hold ...';
   }
   58% {
       content: 'Hold ..';
   }
   80% {
       content: 'Exhale ..'; /* Adjusted timing for the end of exhale */
   /* }
   100% {
       content: 'Breath In ...'; /* Delay before starting over */
   /* } */
       
   /* } */ 

   .animate {
  align-items: center;
  font-size: 1.2em;
} */

.anitext {
    width: 100%;
    height: 100%;
    margin-bottom: 20px;
    margin-top: 20px;

}
.container1 {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    margin-bottom: 20px;
    margin-top: 8px;
}
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    max-width: 600px;
}

.imagecoffee {
    width: 100%;
    height: 100%;
    margin-bottom: 20px;
    border-radius: 12px;

}



</style>
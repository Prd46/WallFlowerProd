<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Meditations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<main>


<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/air.svg"/>
                <h1 class="main_label_header TL">Calm Breathing</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some rhythmic breathing exercises to help you calm down and clear your mind.
            </p>
        </div>
        <br>
        <div class="container">
        <img src="media/breathing.gif" alt="Wallflower" class="imagecoffee">
</div>

<!-- <div class="animate"> -->
<div class="container1">
<div class="anitext">
<img src="media/Breath-in-out.gif" alt="Wallflower">
</div></div>
        



</main>

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
   }
   100% {
       content: 'Breath In ...'; /* Delay before starting over */
   }
       
   }

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
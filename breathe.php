<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Meditations'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>

<main>

<div class="main_label">
            <div class="main_label_header">
                <img class="icon main_label_icon" src="media/icons/air.svg"/>
                <h1 class="main_label_header TL">Flower</h1>
            </div>
            <p class="BM main_label_caption">
            Here are some rhythmic breathing exercises to help you calm down and clear your mind.
            </p>
        </div>
        <br><br><br><br><br>

        <div class="container">
        <div class="droplet" id="no1"></div>
        <div class="droplet" id="no2"></div>
        <div class="droplet" id="no3"></div>
        <div class="droplet" id="no4"></div>
        <div class="droplet" id="no5"></div>
        <div class="droplet" id="no6"></div>
        <div class="droplet" id="no7"></div>
        <div class="droplet" id="no8"></div>
        <div class="droplet" id="no9"></div>
        <div class="droplet" id="no10"></div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h3 class="font_center">Breathe in...</h3>
        </div>



</main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>

<style>
.font_center {
  align-items: center;
  font-size: 1.2em;
}
body {
  }
  .container {
    height: 100px;
    width: 100px;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
  }
  
  .droplet {
    border-radius: 5px 90%;
    border-style: solid;
    border-width: 5px;
    /* border-color: #9FFFEE; */
    border:none;
    height: 100px;
    margin: auto;
    width: 140px;
    position: absolute;
    top: 50px;
    left: 50px;
    /* top: 50%;
      right: 50%;*/
    transform-origin: left top;
    opacity: 0;
  }
  
  #no1 {
    background: #89BB1E;
    animation: spin 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0s;
  }
  
  #no2 {
    background: #FFD449;
    animation: spin2 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.05s;
  }
  
  #no3 {
    background: #89BB1E;
    animation: spin3 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.1s;
  }
  
  #no4 {
    background: #FFD449;
    animation: spin4 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.15s;
  }
  
  #no5 {
    background: #89BB1E;
    animation: spin5 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.2s;
  }
  
  #no6 {
    background: #FFD449;
    animation: spin6 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.25s;
  }
  
  #no7 {
    background: #89BB1E;
    animation: spin7 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.30s;
  }
  
  #no8 {
    background: #FFD449;
    animation: spin8 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.35s;
  }
  
  #no9 {
    background: #89BB1E;
    animation: spin9 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.40s;
  }
  
  #no10 {
    background: #FFD449;
    animation: spin10 5s ease-out infinite;
    animation-fill-mode: forwards;
    animation-delay: 0.45s;
  }
  
  @keyframes spin {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(324deg) scale(1);
      transform: rotate(324deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(324deg) scale(1);
      transform: rotate(324deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin2 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(288deg) scale(1);
      transform: rotate(288deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(288deg) scale(1);
      transform: rotate(288deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin3 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(252deg) scale(1);
      transform: rotate(252deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(252deg) scale(1);
      transform: rotate(252deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin4 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(2160deg) scale(1);
      transform: rotate(216deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(216deg) scale(1);
      transform: rotate(216deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin5 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(180deg) scale(1);
      transform: rotate(180deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(180deg) scale(1);
      transform: rotate(180deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin6 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(144deg) scale(1);
      transform: rotate(144deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(144deg) scale(1);
      transform: rotate(144deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin7 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(108deg) scale(1);
      transform: rotate(108deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(108deg) scale(1);
      transform: rotate(108deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin8 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(72deg) scale(1);
      transform: rotate(72deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(72deg) scale(1);
      transform: rotate(72deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin9 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(36deg) scale(1);
      transform: rotate(36deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(36deg) scale(1);
      transform: rotate(36deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
  
  @keyframes spin10 {
    0% {
      opacity: 0;
      -webkit-transform: rotate(0deg) scale(0.01);
      transform: rotate(0deg) scale(0.01);
    }
    20% {
      opacity: 100;
      -webkit-transform: rotate(0deg) scale(1);
      transform: rotate(0deg) scale(1);
    }
    60% {
      opacity: 100;
      -webkit-transform: rotate(0deg) scale(1);
      transform: rotate(0deg) scale(1);
    }
    80% {
      opacity: 0;
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
    100% {
      -webkit-transform: rotate(720deg) scale(0.01);
      transform: rotate(720deg) scale(0.01);
    }
  }
</style>
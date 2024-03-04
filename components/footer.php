        <div class="header_image_box">
            <div class="backgroundBrick">
            </div>
        </div>

<footer>
<div class="footer_grass_box">
            <div class="footer_grass">
            </div>
        </div>
            <div class="footer_buttons">
                <a href="favorites.php">
                    <div class="footer_button flex column aicenter">
                        <div class="footer_homeButton_oval js-fbutton fb1">
                            <img class="fbi1 icon footer_icon_image bookmark" src="media/icons/darkBookmark.svg"/>
                            <img class="icon footer_icon_image" src="media/icons/saved.svg"/>
                        </div>
                        <p class="footer_button_text LM">Saved</p>
                    </div>
                </a>
                <a href="index.php">
                    <div class="footer_button flex column aicenter">
                        <div class="footer_homeButton_oval js-fbutton fb2 oval_lit">
                            
                            <img class="fbi2 icon footer_icon_image bookmark" src="media/icons/home_icon.svg"/>
                            <img class="icon footer_icon_image" src="media/icons/whiteHome.svg"/>
                        </div>
                        <p class="footer_button_text LM">Explore</p>
                    </div>
                </a>
                <a href="sos.php">
                    <div class="footer_button flex column aicenter">
                        <div class="footer_homeButton_oval js-fbutton fb3">
                            <img class="fbi3 icon footer_icon_image bookmark" src="media/icons/darkPhone.svg"/>
                            <img class="icon footer_icon_image" src="media/icons/phone.svg"/>
                        </div>
                        <p class="footer_button_text LM">S.O.S</p>
                    </div>
                </a>   
            </div>
        </footer>


        <!-- <script src="scripts/functions.js"></script> -->
</body>
<script>
    const b1 = document.querySelector('.fb1');
    const bi1 = document.querySelector('.fbi1');
    const b2 = document.querySelector('.fb2');
    const bi2 = document.querySelector('.fbi2');
    const b3 = document.querySelector('.fb3');
    const bi3 = document.querySelector('.fbi3');

if (document.title =="Saved | Wallflower"){
    // console.log("Saved page");
    b1.classList.add('oval_lit');
    bi1.classList.remove('invis');
    b2.classList.remove('oval_lit');
    bi2.classList.add('invis');
    b3.classList.remove('oval_lit');
    bi3.classList.add('invis');
    }else if(document.title =="SOS | Wallflower"){
    // console.log("SOS page");
    b1.classList.remove('oval_lit');
    bi1.classList.add('invis');
    b2.classList.remove('oval_lit');
    bi2.classList.add('invis');
    b3.classList.add('oval_lit');
    bi3.classList.remove('invis');
    }else{
    b1.classList.remove('oval_lit');
    bi1.classList.add('invis');
    b2.classList.add('oval_lit');
    bi2.classList.remove('invis');
    b3.classList.remove('oval_lit');
    bi3.classList.add('invis');
    // console.log("Explore");

};
</script>
</html>

<!-- this script JS is for button switch UI but doesnt work-->
<!-- <script src="/scripts/templatejavatest.js"></script> -->

<style>
.footer_button.active {
  background-color: #B6D085;
}

.footer_buttons {
  display: flex;
  justify-content: space-around;
  align-items: center;
  height: 80px;
  padding: 0;
  position: relative; /* Ensure the footer has a relative position */
  z-index: 1; /* Set z-index to ensure footer content is above grass layer */
}

/* .footer_buttons::before {
  content: "";
  display: flex;
  justify-content: center;
  position: absolute;
  top: -48px; 
  left: -1px;
  width: 100.5%;
  height: 50px; 
  margin: 0 auto;
  background-image: url('/media/grassy_border.svg'); 
  background-size: cover; 
  background-position: center;
  background-repeat: repeat-x;
  z-index: 0; 
} */
.footer_grass{
    display: flex;
  justify-content: center;
  position: absolute;
  width: 100.4%;
  bottom: 60px;
  height: 50px; 
  margin: 0 auto;
  background-image: url('media/grassy_border.svg'); 
  background-size: cover; 
  background-position: center;
  background-repeat: repeat-x;
}
</style>
<footer>
            <div class="footer_buttons">
                <a href="favorites.php">
                    <div class="footer_button flex column aicenter">
                        <div class="footer_icon">
                            <img class="icon footer_icon_image" src="media/icons/saved.svg"/>
                        </div>
                        <p class="footer_button_text LM">Saved</p>
                    </div>
                </a>
                <a href="index.php">
                    <div class="footer_button flex column aicenter">
                        <div class="footer_homeButton_oval ">
                            <img class="icon footer_icon_image" src="media/icons/home_icon.svg"/>
                        </div>
                        <p class="footer_button_text LM">Explore</p>
                    </div>
                </a>
                <a href="sos.php">
                    <div class="footer_button flex column aicenter">
                        <div class="footer_icon">
                            <img class="icon footer_icon_image" src="media/icons/phone.svg"/>
                        </div>
                        <p class="footer_button_text LM">S.O.S</p>
                    </div>
                </a>   
            </div>
        </footer>

        <div class="header_image_box">
            <div class="backgroundBrick">
                <img src="media/brick_bg.webp"/>
            </div>
        </div>
        <script src="scripts/functions.js"></script>
</body>
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

.footer_buttons::before {
  content: "";
  position: absolute;
  top: -48px; /* Adjust as needed to position the grass image */
  left: 0;
  width: 100%;
  height: 50px; /* Adjust as needed */
  background-image: url('/media/grassy_border.svg'); /* Replace with your grass image */
  background-size: cover; /* Adjust as needed */
  background-position: center; /* Adjust as needed */
  background-repeat: repeat-x; /* Repeat horizontally */
  z-index: 0; /* Ensure the grass layer is below footer content */
}

</style>
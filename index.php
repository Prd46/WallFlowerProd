<?php 
   include_once __DIR__ . '/connection.php';
  $page_name = 'Home'; // Gives a value if page name is missing
  include_once __DIR__ . '/components/header.php'
?>
<div class="header_menu_vine">
</div>
<main>
        <div class="index_main_widget flex jccenter">
            <div class="index_main_widget_content TS">I am loved and worthy</div>
        </div>
        <div class="index_main_pageButtons">
    <!-- ONE LEAF CARD -->
        <a href="affirmations.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/lightbulb.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Affirmations</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <!-- END OF LEAF CARD -->
        <a href="conversationStarters.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/forum.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Icebreakers</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="listen.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/headphones.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Sounds</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="breathe.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/air.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Meditations</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="articles.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/newsmode.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Articles</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="play.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/extension.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Puzzles</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="journal.php">
            <div class="leaf_card flex aicenter">
                <div class="leaf_card_image">
                    <img class="icon leaf_icon" src="media/icons/edit.svg"/>
                </div>

                    <div class="leaf_card_text">
                        <div class="leaf_card_title">
                            <h3 class="TS">Journal</h3>
                        </div>
                        <div class="leaf_card_caption">
                            <p class="BM"></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </main>

<?php 
  include_once __DIR__ . '/components/footer.php'
?>
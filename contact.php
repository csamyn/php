<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "contact"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

    <div id="content" class="contact">
        <div class="container">
                <div class="contact-left">
                	<h3>CONTACT</h3>
                    <p>N'hésitez pas à nous contacter si vous avez des questions ou remarques sur Petsitting.</p>
                    <form id="contact-form">
                        <div id="contact-letter">
                            <div class="contact-infos">
                                <input type="text" name="prenom" placeholder="Prénom" /><br />
                                <input type="text" name="email" placeholder="Email" /><br />
                            </div>

                            <textarea class="contact-msg" name="message" placeholder="Entrez votre message ici"></textarea>
                        </div><!-- end contact-letter -->

                        <input type="submit" class="contact-submit" value="Envoyer votre message" />
                    </div><!-- end contact-left -->

                    <div class="contact-right">
                        <img src="img/birds.png" alt="Oiseau" />
                    </div><!-- end contact-right -->

                    </form>

    	</div><!-- end container -->
    </div><!-- end content -->

    <?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/plugin/jquery.nivo.slider.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
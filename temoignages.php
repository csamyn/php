<?php
require_once __DIR__ . "/inc/config.inc.php";
?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "temoignages"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

	<div class="container">
		<div id="temoignages">

			<h3>Témoignages</h3>
			<p>Découvrez les témoignages vécus par ces personnes grace à Petsitting</p>

			<div class="temoignages">
			<img src="img/temoignage_1.png" alt="Témoignages Petsitting" />
			<p>" C'est grâce à Petsitting que je l'ai rencontré, un beau matin de mai je me suis rendue à son domicile. Ses grands yeux m'ont tout de suite fait craquer, il avait l'air si doux que tout de suite j'ai eu envie de l'apprivoiser. Depuis je ne l'ai plus quitté. Merci Tigrou de m'avoir permis de rencontrer Anthony. " - <span>Sophia</span>, 32 ans</p>
			<div id="action_tem">
			<div class="temoignages_action_1">
			<div class="comment_tem"></div>
			<p>(12)</p>
			</div>
			<div class="temoignages_action_2">
			<div class="like_tem"></div>
			<p>(82)</p>
			</div>
			</div>
			</div>

			<div class="temoignages">
			<img src="img/temoignage_2.png" alt="Témoignages Petsitting" />
			<p>" Grâce à Petsitting j'ai enfin rencontré mes voisins, en gardant leurs animaux pendant qu'ils partaient en vacances. " - <span>Céline</span>, 30 ans</p>
			<div id="action_tem">
			<div class="temoignages_action_1">
			<div class="comment_tem"></div>
			<p>(12)</p>
			</div>
			<div class="temoignages_action_2">
			<div class="like_tem"></div>
			<p>(82)</p>
			</div>
			</div>
			</div>

			<div class="temoignages" id="last">
			<img src="img/temoignage_3.png" alt="Témoignages Petsitting" />
			<p>" Grâce à Petsitting j'ai eu l'occasion de garder Panpan, ce charmant lapin qui m'a permit d'en charmer plus d'une, un vrai piège à fille. " - <span>Nicolas</span>, 26 ans</p>
			<div id="action_tem">
			<div class="temoignages_action_1">
			<div class="comment_tem"></div>
			<p>(12)</p>
			</div>
			<div class="temoignages_action_2">
			<div class="like_tem"></div>
			<p>(82)</p>
			</div>
			</div>
			</div>

			<div class="temoignages_form">
			<p>Faites nous vous aussi part de vos expériences, anecdotes:</p>
			<textarea class="envoi_temoignages" name="message" placeholder="Entrez votre témoignage ici"></textarea>
			<input type="submit" value="Envoyer" />
			</div><!-- end temoignages_form -->

		</div><!-- end temoignages -->
	</div><!-- end container -->
	<?php include __DIR__ . "/inc/partial/footer.inc.php" ?>
</body>
</html>
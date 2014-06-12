<?php
require_once __DIR__ . "/inc/config.inc.php";

if(isset($_GET['id']) && intval($_GET['id']) != 0) {
    $id = intval($_GET['id']);
} elseif(isAuthenticated()) {
    $id = $_SESSION['user']['id'];
} else {
    header('Location: index.php');
    exit;
}

$currentOwner = false;

$user = loadUser($id);

$pet = getPetForUser($id);

if(isset($_SESSION['user']) && $pet['id_user'] == $_SESSION['user']['id']) {
$currentOwner = true;
}

$connected = false;

if(isAuthenticated()) {
    $connected = true;
}

?>

<html>

<head>
    <?php
        $pageTitle = 'Profil';
        $pageActive = "register";
        include __DIR__ . "/inc/partial/head.inc.php";
    ?>
</head>

<body>

<?php include __DIR__ . "/inc/partial/header.inc.php"; ?>

	<div class="container">
	<div class="profil">
		<div class="title">
			<h4 class="pet-name"><?php print $user['username']; ?></h4>
			<?php if(isset($user['city']) && $user['city'] != '') { ?>
        <div class="pet-location"><img src="img/map.png" alt="map" /><?php print ucfirst($user['city']); ?></div><?php } ?>
		</div>
        <?php if(isAuthenticated()){ ?>
        <a class="modifier" href="modifier_profil.php">Modifier mon profil</a>
        <?php } ?>
		<div class="infos">
			<div class="column infos">
				<ul>
					<li class="race">
						<div class="list-img"></div>
						<div class="list-content"><?php if(($user['firstname'] != null && $user['firstname'] != '') || ($user['lastname'] != null && $user['lastname'] != '')) { print $user['firstname'] . ' ' . $user['lastname']; } ?></div>
					</li>                    
                    <li class="age">
						<div class="list-img"></div>
						<div class="list-content"><?php if(($user['age'] != null && $user['age'] != '')) {  print $user['age'] . ' ans'; } ?></div>
					</li>
                    
                    <li class="submit"><a class='inline' href="#inline_content"><input type="submit" value="Contactez moi"></a></li>

        <!-- HIDDEN CONTENT -->
        <div style='display:none'>
            <div id='inline_content' style='padding:10px; background:#fff;'>
                    
                    <?php if($connected) { ?>
                    <a class="close" href="#"></a>
                    <h3>CONTACT</h3>
                    <input type="text" name="prenom" placeholder="Prénom" /><br />
                    <input type="text" name="objet" placeholder="Objet" /><br />
                    <textarea class="contact-msg" name="message" placeholder="Entrez votre message ici"></textarea>

                    <input type="submit" class="contact-submit" value="Envoyer votre message" />
                    <?php } else { ?>
                    <a class="close" href="#"></a>
                    <div id="connect_message">
                    <p>Vous devez être inscrit pour pouvoir laisser un message à cet utilisateur.</p>
                    <p><a href="inscription.php?redirectprofil=<?php print $id; ?>">Inscrivez vous</a> ou <a href="inscription.php?redirectprofil=<?php print $id; ?>">Connectez vous</a></p>
                    </div>
                    <?php } ?>
            </div><!-- end inline_content -->
        </div><!-- end display none -->                    
                    
				</ul>
			</div>
			<div class="column profile-img">
				<div class="user-profile-img" style="background: url('uploads/user_profile/<?php print $user['id']; ?>.png');"></div>
			</div>
            <div class="column dates">
                <div class="petsitting">
                    <span class="head">A déjà effectué:</span><br />
                    <span class="number"><strong>25</strong> petsittings</span>
                </div>
                <div class="rate">
                    <span class="head">Notes:</span><br />
                    <a href="#"><span class="star_rate"></span></a>
                </div>
            </div><!-- end column dates -->
		</div><!-- end content -->
	</div><!-- end profil -->

		<div id="profil-nav_user">
			<ul>
				<li class="commentaires profil-block-link active" data-show="profil-comment"><a href="profil.php">Commentaires</a></li>
				<li class="informations  profil-block-link" data-show="profil-infos"><a href="profil-informations.html">Informations</a></li>
			</ul>
		</div><!-- end profil-nav -->

        <div id="profil-comment" class="profil-block">

			<div class="comment-left">
                <div class="comment">
                <a href="profil.php?id=1"><div class="comment-pic_1"></div></a>
                <div class="comment-int">
                	<span><div id="title">Axelb - il y a 5 minutes</div></span>
                	<p>Très bon petsitter, je le recommande!</p>
                </div><!-- end comment-int -->
            	</div><!-- end comment -->

            	<div class="comment">
                <a href="profil.php?id=4"><div class="comment-pic_2"></div></a>
                <div class="comment-int">
                	<span><div id="title">Laetitias - il y a 4 jours</div></span>
                	<p>Encore merci pour le petsitting !</p>
                </div><!-- end comment-int -->
            	</div><!-- end comment -->

            	<div class="comment">
            		<div class="submit-pic"></div>
            		<div class="submit-text">
            		<p>Ecrire un commentaire à <?php print $user['username']; ?>:</p>
                	<textarea placeholder="Ecrivez votre commentaire ici..." name="commentaire"></textarea>
                	<input type="submit" class="contact-submit" value="Envoyer le message" />
                	</div>
            	</div><!-- end comment -->
			</div><!-- end comment-left -->

			<div class="comment-right">
					<div class="comment-visit">
					<p>Liste des derniers visiteurs</p>
					<a href="#"><img src="img/visit-pic-cat.png" alt="Photo de profil chat" /></a>
					<a href="#"><img src="img/visit-pic-dog.png" alt="Photo de profil chien" /></a>
					<a href="#"><img src="img/visit-pic-rodent.png" alt="Photo de profil rongeur" /></a>
					<a href="#"><img src="img/visit-pic-bird.png" alt="Photo de profil oiseau" /></a>
					<a href="#"><img src="img/visit-pic-fish.png" alt="Photo de profil poisson" /></a>
					<a href="#"><img src="img/visit-pic-cat.png" alt="Photo de profil chat" /></a>
					<a href="#"><img src="img/visit-pic-dog.png" alt="Photo de profil chien" /></a>
					<a href="#"><img src="img/visit-pic-rodent.png" alt="Photo de profil rongeur" /></a>
					<a href="#"><img src="img/visit-pic-bird.png" alt="Photo de profil oiseau" /></a>
					<a class="resultats" href="#">Plus de résultats</a>
				</div>
			</div><!-- end comment-right -->
			
		</div><!-- end profil-comment -->

        <div id="profil-infos" class="profil-block">
            <?php if($connected) { ?>
            <div id="infos-petowner">
            	<div class="infos-top-left">
            		<h5><div class="infos-title_petowner">Propriétaire</div></h5>
            		<ul>
            			<li>Prénom: <?php print $user['firstname']; ?></li>
            			<li>Âge: <?php print $user['age']; ?> ans</li>
            			<li>Ville: <?php print ucfirst($user['city']); ?></li>
            			<?php if($user['accommodation'] != null) { ?><li>Habitat: <?php print _getAccomodation($user['accommodation']) ?></li><?php } ?>
            		</ul>
            	</div><!-- end infos-top-left -->

            	<div class="infos-top-right">
            		<h5><div class="infos-title_contact">Contact</div></h5>
            		<ul>
            			<li><?php print $user['email']; ?></li>
            			<li><?php print $user['phone']; ?></li>
            		</ul>
            	</div><!-- end infos-top-right -->
        	</div><!-- end infos-petowner -->

        	<div id="infos-pet">
            	<div class="infos-bottom-left">
            		<h5><div class="infos-title_pet">Garde</div></h5>
            		<ul>
            			<?php if($user['interest_cat']) { ?><li>Chat</li><?php } ?>
            			<?php if($user['interest_dog']) { ?><li>Chien</li><?php } ?>
            			<?php if($user['interest_bird']) { ?><li>Oiseau</li><?php } ?>
            			<?php if($user['interest_fish']) { ?><li>Poisson</li><?php } ?>
            			<?php if($user['interest_rodent']) { ?><li>Rongeur</li><?php } ?>
            		</ul>
            	</div><!-- infos-bottom-left -->

            	<div class="infos-bottom-right" id="visit">
            		<h5><div class="infos-title_visit">Petsittings effectués</div></h5>
            		<ul>
            			<li><a href="#"><img src="img/visit-pic-cat.png" alt="Photo de profil chat" /></a></li>
            			<li><a href="#"><img src="img/visit-pic-dog.png" alt="Photo de profil chien" /></a></li>
            			<li><a href="#"><img src="img/visit-pic-bird.png" alt="Photo de profil oiseau" /></a></li>
            			<li></li>
            		</ul>
            	   </div><!-- end infos-bottom-right -->
        	</div><!-- end infos-pet -->
            <?php } else { ?>
            <p>Vous devez être inscrit pour accèder à ces informations. <a class="connect" href="inscription.php?redirectprofil=<?php print $id; ?>">Connectez-vous</a> ou <a class="connect" href="inscription.php?redirectprofil=<?php print $id; ?>">Inscrivez vous</a>.</p>
            <?php } ?>
        </div><!-- end profil-infos -->

	</div><!-- end container -->

    <?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
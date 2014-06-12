<?php
require_once __DIR__ . "/inc/config.inc.php";

$connected = false;

if(isAuthenticated()) {
    $connected = true;
}

if(isset($_GET['id']) && intval($_GET['id']) != 0) {
    $id = intval($_GET['id']);
    $pet = loadPet($id);
} else {
    $id = $_SESSION['user']['id'];
    $pet = getPetForUser($id);

    if( ! $pet && $connected) {
        header('Location: animal.php');
    }
}

$currentOwner = false;

$user = getUserForPet($pet);

if(isset($_SESSION['user']) && $pet['id_user'] == $_SESSION['user']['id']) {
$currentOwner = true;
}

?>


<html>

<head>
    <?php
        $pageTitle = 'Profil animal';
        $pageActive = "register";
        include __DIR__ . "/inc/partial/head.inc.php";
    ?>
</head>

<body>

<?php include __DIR__ . "/inc/partial/header.inc.php"; ?>

	<div class="container">
	<div class="profil">
		<div class="title">
			<h4 class="pet-name"><?php print $pet['name']; ?></h4>
            <div class="list-img"></div>
			<div class="pet-location"><img src="img/map.png" alt="map" /><?php print ucfirst($user['city']); ?></div>
		</div><!-- end title -->
        <?php if($currentOwner){ ?>
        <a class="modifier" href="animal.php">Modifier mon animal</a>
        <?php } ?>
		<div class="infos">
			<div class="column infos">
				<ul>
					<li class="race">
						<div id="icone" class="icone<?php print $pet['type']; ?>"></div>
						<div class="list-content"><?php print $pet['race'] ?> / <?php print _getGender($pet['gender']); ?></div>
					</li>
					<li class="age">
						<div class="list-img"></div>
						<div class="list-content"><?php print _getCorrectAge($pet); ?></div>
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
			</div><!-- end column infos -->
			<div class="column profile-img" style="border-radius: 50px;">
				<div class="pet-profile-img" style="background: url('uploads/pet_profile/<?php print $pet['id']; ?>.png');"></div>
			</div><!-- end column profile-img -->
			<div class="column dates">
				<div class="dates-inner">
					<span class="head">Arrivée</span>
					<span class="date"><strong>18</strong> avril</span>
				</div><!-- end column-date -->
				<div class="dates-inner">
					<span class="head">Départ</span>
					<span class="date"><strong>25</strong> avril</span>
				</div><!-- end dates-inner -->
			</div><!-- end column dates -->
		</div><!-- end content -->
	</div><!-- end profil -->

		<div id="profil-nav">
			<ul>
				<li class="commentaires profil-block-link active" data-show="profil-comment"><a href="#">Commentaires</a></li>
				<li class="icone_information<?php print $pet['type']; ?> profil-block-link" data-show="profil-infos"><a href="#">Informations</a></li>
				<li class="photos profil-block-link" data-show="profil-photos"><a href="#">Photos</a></li>
			</ul>
		</div><!-- end profil-nav -->

		<div id="profil-comment" class="profil-block">

			<div class="comment-left">
				<div class="comment">
                <a href="profil.php?id=1"><div class="comment-pic_1"></div></a>
                <div class="comment-int">
                	<span><div id="title">Axelb - il y a 5 minutes</div></span>
                	<p>Il est magnifique, je me ferais une joie de le garder à l'occasion :)</p>
                </div><!-- end comment-int -->
            	</div><!-- end comment -->

            	<div class="comment">
                <a href="profil.php?id=4"><div class="comment-pic_2"></div></a>
                <div class="comment-int">
                	<span><div id="title">Laetitias - il y a 4 jours</div></span>
                	<p>Ce qu'il est beau !</p>
                </div><!-- end comment-int -->
            	</div><!-- end comment -->

            	<div class="comment">
            		<div class="submit-pic"></div>
            		<div class="submit-text">
            		<p>Ecrire un commentaire au propriétaire de <?php print $pet['name']; ?> :</p>
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
				</div><!-- end comment-visit -->
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
            			<li>Habitat: Maison</li>
            			<li>Souhaite: Faire garder son animal à domicile</li>
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
            		<h5><div class="infos-title_pet">Animal</div></h5>
            		<ul>
            			<li>Nom: <?php print $pet['name']; ?></li>
            			<li>Genre: <?php print _getGender($pet['gender']); ?></li>
            			<li>Race: <?php print $pet['race'] ?></li>
            			<li>Âge: <?php print _getCorrectAge($pet); ?></li>
            			<li>Nourriture: <?php print $pet['food']; ?></li>
            		</ul>
            	</div><!-- end infos-bottom-left -->
            	<div class="infos-bottom-right">
            		<h5> <div class="infos-title_health">Soins / santé</div></h5>
            		<ul>
            			<li>Particulatiré: <?php print $pet['particularity']; ?></li>
            			<li>Santé: <?php print _getHealth($pet['health']); ?></li>
            			<li>Note: <?php print $pet['comment']; ?></li>
            		</ul>
            	</div><!-- end infos-bottom-right -->
        	</div><!-- end infos-pet -->
            <?php } else { ?>
                <p>Vous devez être inscrit pour accèder à ces informations. <a class="connect" href="inscription.php?redirectanimal=<?php print $id; ?>">Connectez-vous</a> ou <a class="connect" href="inscription.php?redirectanimal=<?php print $id; ?>">Inscrivez vous</a>.</p>
            <?php } ?>
        </div><!-- end profil-infos -->

        <div id="profil-photos" class="profil-block">

            <?php for($i = 0; $i < 8; $i++) { ?>
            <div class="profil_photos">
                <img src="img/profil-photos.png" alt="Photo de l'animal">
                <div class="actions-pics">
                    <div class="action-pics like-click <?php $un = rand(0, 1); if($un) { print 'un'; } ?>like-pics"><p><?php print rand(0, 40); ?></p></div>
                    <div class="action-pics comment-pics"><p><?php print rand(0, 40); ?></p></div>
                </div>
            </div>
            <?php } ?>

        </div><!-- end profil-photos -->

	</div><!-- end container -->

    <?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
<?php
require_once __DIR__ . "/inc/config.inc.php";

$pets = loadPets(4);
$user = loadUsers(4);

?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>
	    <?php $pageActive = "home"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

        <div id="banner">

            <div class="container">
                
                <h1>Garder ou faire garder un animal facilement</h1>
                <p>Grace à Petsitting trouver des personnes <strong>fiables</strong> à proximité de chez vous pour garder vos <strong>animaux de compagnie</strong> et cela <strong>gratuitement</strong>.</p>

                <div class="banner-column">
                	<h2>Vous souhaitez <strong>garder</strong> des animaux</h2>
                	<ul>
                		<li><strong>Créer</strong> un profil personnel</li>
                		<li><strong>Trouver</strong> des petowners à proximité de chez vous</li>
                		<li><strong>Contacter</strong> des petowners</li>
                	</ul>
                	<div id="button-petsitters"><a href="inscription.php">Je suis Petsitter</a></div>
        		</div><!-- end banner-column -->

        		<div class="banner-column">
        			<h2>Vous souhaitez <strong>faire garder</strong> vos animaux</h2>
        			<ul>
                		<li><strong>Trouver</strong> et <strong>contacter</strong> des petsitters à proximité de chez vous</li>
                		<li><strong>Créer</strong> votre profil et celui de votre animal</li>
                		<li><strong>Evaluer</strong> les petsitters</li>
                	</ul>
                	<div id="button-petowners"><a href="inscription.php">Je suis Petsitter</a></div>
        		</div><!-- end banner-column -->

        	</div><!-- end conainter -->

        </div><!-- end banner -->

        <div id="content">

            <div class="container">

                <h3>Ils vont les chouchouter<h3>

                <?php
                    $nb = 0;

                    foreach($user as $user){
                        $nb++;
                        include __DIR__ . '/inc/partial/block_user.inc.php';
                    }
                ?>

                <a class="resultats" href="petsitters.php">Plus de résultats</a>
                <div class="clearfix"></div>

                <h3>Ils vont vous faire craquer</h3>

                <?php
                    $nb = 0;

                    foreach($pets as $pet){
                        $nb++;
                        include __DIR__ . '/inc/partial/block_pet.inc.php';
                    }
                ?>

                <a class="resultats" href="annonces.php">Plus de résultats</a>
                <div class="clearfix"></div>

            <div id="bottom">

            <div class="search-column_left">
                <h3>Nos meilleurs petsitters</h3>
                <ul>
                    <a href="profil.php?id=1"><li>Cskellington</li></a>
                    <a href="profil.php?id=2"><li>Axelb</li></a>
                    <a href="profil.php?id=9"><li>Sophied</li></a>
                    <a href="profil.php?id=4"><li>Laetitias</li></a>
                    <a href="profil.php?id=5"><li>Mel256</li></a>
                </ul>
            </div><!-- end search-column_left -->

            <div class="search-column_right">
                
                <h3>Recherche avancée</h3>

                <form id="search-column" action="recherche.php" method="get">

                    <fieldset>

                        <label for="search">Je cherche</label>
                        <select name="type" required="required">
                            <option value="<?php print TYPE_USER_PET_SITTER; ?>">Petsitters</option>
                            <option value="<?php print TYPE_USER_PET_OWNER; ?>">Animal</option>
                        </select>

                    </fieldset>

                    <fieldset>

                        <label for="search"><span class="search-verb">Qui garde</span></label>  
                        <ul class="animal">
                            <li>
                                <input type="checkbox" id="cat" name="pet[]" value="<?php print TYPE_PET_CAT; ?>" id="chats">
                                <label for="cat">Chats</label>
                            </li>
                            <li>
                                <input type="checkbox" id="dog" name="pet[]" value="<?php print TYPE_PET_DOG; ?>" id="chiens">
                                <label for="dog">Chiens</label>
                            </li>
                            <li>
                                <input type="checkbox" id="rodent" name="pet[]" value="<?php print TYPE_PET_RODENT; ?>" id="rongeurs">
                                <label for="rodent">Rongeurs</label>
                            </li>
                            <li>
                                <input type="checkbox" id="bird" name="pet[]" value="<?php print TYPE_PET_BIRD; ?>" id="oiseaux">
                                <label for="bird">Oiseaux</label>
                            </li>
                            <li>
                                <input type="checkbox" id="fish" name="pet[]" value="<?php print TYPE_PET_FISH; ?>" id="poissons">
                                <label for="fish">Poissons</label>
                            </li>
                            <li>
                                <input type="checkbox" id="other" name="pet[]" value="<?php print TYPE_PET_OTHER;; ?>" id="autre">
                                <label for="other">Autres</label>
                            </li>
                        </ul>

                    </fieldset> 

                    <fieldset>

                        <label for="city">Localité</label>
                        <select name="city" id="villes">
                            <option class="default" value="ordre" selected="selected">- Ville -</option>
                            <?php print getCities(true); ?>
                        </select>

                    </fieldset> 

                        <input type="submit" value="Lancer la recherche">

                </form>

            </div><!-- end search-column_right -->

            </div><!-- end container -->

        </div><!-- end content -->

    <?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
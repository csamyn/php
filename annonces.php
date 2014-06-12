<?php
require_once __DIR__ . "/inc/config.inc.php";

// Filtres
$filters = array();

if(isset($_GET['city']) && $_GET['city'] != 'ordre') { $filters['city'] = $_GET['city']; }
if(isset($_GET['type']) && $_GET['type'] != 'all') { $filters['type'] = $_GET['type']; }

$pets = loadPets(12, $filters);

?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "annonces"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

    <div id="content" class="annonces">
            <div class="container">
                <!-- filtres -->
                <div class="filters">
                    <p class="tri">Trier par:</p>
                    <form>
                        <!--<label for="type">Type d'animal</label>-->
                        <select class="tri" name="type" id="types">
                            <option value="all">- Animal -</option>
                            <option value="<?php print TYPE_PET_CAT; ?>">Chat</option>
                            <option value="<?php print TYPE_PET_DOG; ?>">Chien</option>
                            <option value="<?php print TYPE_PET_BIRD; ?>">Oiseau</option>
                            <option value="<?php print TYPE_PET_RODENT; ?>">Rongeur</option>
                            <option value="<?php print TYPE_PET_FISH; ?>">Poisson</option>
                            <option value="<?php print TYPE_PET_OTHER; ?>">Autre</option>
                        </select>

                        <!--<label class="tri" for="city">Localité</label>-->
                        <select class="tri" name="city" id="villes">
                            <option class="default" value="ordre" selected="selected">- Villes -</option>
                            <?php
                            if(isset($_GET['city'])) { $currentCity = $_GET['city']; } else { $currentCity = null; }
                            print getCities(true, $currentCity);
                            ?>
                        </select>

                        <input class="tri" id="tri" type="submit" value="Trier" />
                        <!--<a href="annonces.php">Réinitialiser</a>-->
                    </form>
                </div><!-- end filters -->

                <?php
                    $nb = 0;

                    foreach($pets as $pet){
                        $nb++;
                        include __DIR__ . '/inc/partial/block_pet.inc.php';
                    }

                    if(count($pets) == 0){
                        print '<p class="error_annonces">Aucun animal ne correspond à votre recherche.</p>';
                    }
                ?>
        </div>
    </div>

    <?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
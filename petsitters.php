<?php
require_once __DIR__ . "/inc/config.inc.php";

$filters = array();

if(isset($_GET['city'])) { $filters['city'] = $_GET['city']; }

$users = loadUsers(50, $filters);

?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "petsitters"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

    <div id="content" class="annonces">
            <div class="container">

                <!-- filtres -->
                <div class="filters_petsitters">
                    <p class="tri">Trier par:</p>
                    <form>
                        <!--<label for="city">Localité</label>-->
                        <select class="tri" name="city" id="villes">
                            <option class="default" value="ordre" selected="selected">- Villes -</option>
                            <?php
                            if(isset($_GET['city'])) { $currentCity = $_GET['city']; } else { $currentCity = null; }
                            print getCities(true, $currentCity);
                            ?>
                        </select>

                        <input class="tri" id="tri" type="submit" value="Trier" />
                        <!--<a href="petsitters.php">Réinitialiser</a>-->
                    </form>
                </div>
                <!-- /filtres -->

                <?php
                    $nb = 0;

                    foreach($users as $user){
                        $nb++;
                        include __DIR__ . '/inc/partial/block_user.inc.php';
                    }

                    if(count($users) == 0){
                        print '<p class="error_annonces">Aucun petsitter ne correspond à votre recherche.</p>';
                    }
                ?>
        </div>
    </div>

    <?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
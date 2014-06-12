<?php
require_once __DIR__ . "/inc/config.inc.php";

if($_GET['type'] == TYPE_USER_PET_OWNER) {
    // Recherche animal
    $results = searchPet($_GET);
} else {
    // Recherche petsitter
    $results = searchUsers($_GET);
}
?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "home"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

<div id="content">
    <div class="container">

        <?php include __DIR__ . "/inc/partial/form_errors.inc.php"; ?>

        <h3>Résultats de la recherche</h3>

        <div class="search-results">
        <?php if(count($results) > 0) { ?>
            <?php if($_GET['type'] == TYPE_USER_PET_OWNER){ // recherche animal ?>
                <?php $nb = 0; foreach($results as $pet) { $nb++; ?>
                    <?php include __DIR__ . '/inc/partial/block_pet.inc.php'; ?>
                <?php } ?>
            <?php } else { ?>
                <?php 
                    $nb = 0; 
                    foreach($results as $user) {
                        $nb++; 
                ?>
                    <div class="content-column <?php if($nb%2) { print 'even'; } else { print 'odd'; } ?>">
                        <img src="uploads/user/<?php print $user['id']; ?>.png" alt="" />
                        <h4><?php print $user['username']; ?></h4>
                        <ul>
                            <li><?php print getCity($user['city']); ?></li>
                            <li><?php print $user['age']; ?> ans</li>
                            <li>Garde : <?php print _getGardes($user); ?></li>
                        </ul>
                        <a class="button" href="profil.php?id=<?php print $user['id']; ?>">Voir le profil</a>
                    </div>
                <?php } ?>
            <?php } ?>
        <?php } else { ?>
            <p>Aucun utilisateur ne correspond à votre recherche.</p>
        <?php } ?>

        </div>

    </div><!-- end container -->
</div><!-- end content -->

<?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
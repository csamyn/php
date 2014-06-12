<header>
    <div class="container">
        <nav id="main-menu">
            <a id="logo" class="logo<?php print rand(1,5); ?>" a href="index.php">Petsitting</a>
            <ul id="main-menu_links">
                <li><a <?php if($pageActive == 'annonces') { ?>class="active"<?php } ?> href="annonces.php">Animaux</a></li>
                <li><a <?php if($pageActive == 'petsitters') { ?>class="active"<?php } ?> href="petsitters.php">Nos petsitters</a></li>
                <li><a <?php if($pageActive == 'temoignages') { ?>class="active"<?php } ?> href="temoignages.php">Témoignages</a></li>

                <?php if(!isset($_SESSION) || !isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) { ?>
                <li class="last"><a <?php if($pageActive == 'register') { ?>class="active"<?php } ?> href="inscription.php">Se connecter / S'inscrire</a></li>
                <?php } else { ?>
                <li class="last" id="submenu_arrow"><a href="profil.php">Bienvenue <?php print $_SESSION['user']['username']; ?></a>        
                    <ul>
                        <li><a href="profil.php">Mon profil</a></li>
                        <?php if(isset($_SESSION['user']['type']) && ($_SESSION['user']['type'] == TYPE_USER_PET_OWNER || $_SESSION['user']['type'] == TYPE_USER_BOTH)) { ?><li><a href="profil_animal.php">Profil animal</a></li><?php } ?>
                        <li><a class="logout" href="logout.php">Deconnexion</a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</header>
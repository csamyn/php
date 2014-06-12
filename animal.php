<?php
require_once __DIR__ . "/inc/config.inc.php";

// Load pet for current user

$pet = getPetForUser($_SESSION['user']['id']);

$errors = array();

if(count($_POST) > 0) {
    if(!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['type'])) {
        $name = _cleanText($_POST['name']);
        $age = intval($_POST['age']);
        $agetype = intval($_POST['agetype']);
        $gender = $_POST['gender'];
        $type = $_POST['type'];
        $food = _cleanText($_POST['food']);
        $particularity = _cleanText($_POST['particularity']);
        $race = $_POST['race'];
        $comment = $_POST['comment'];
        $health = $_POST['health'];
        if(isset($_POST['vaccine'])) { $vaccine = '1'; } else { $vaccine = '0'; }

        $params = array(
            'name' => $name,
            'age' => $age,
            'agetype' => $agetype,
            'gender' => $gender,
            'type' => $type,
            'race' => $race,
            'food' => $food,
            'particularity' => $particularity,
            'vaccine' => $vaccine,
            'health' => $health,
            'comment' => $comment,
        );

        $create = false;
        if($pet == false) {
            $create = true;
            $now = new DateTime();
            $params['created_at'] = $now->format('Y-m-d H:i:s');
            $params['id_user'] = $_SESSION['user']['id'];
        } else {
            $params['id'] = $pet['id'];
        }

        $ok = savePet($params, $create);

        if($ok) {
            header('Location: profil_animal.php');
            exit;
        } else {
            $errors[] = 'Une erreur s\'est produite, veuillez réessayer ultérieurement.';
        }
    } else {
        $errors[] = 'Les champs marqués d\'une étoile sont obligatoires.';
    }
}

?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "register"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

<div id="content" class="animal-form">
    <div class="container">

        <?php include __DIR__ . "/inc/partial/form_errors.inc.php"; ?>

        <h3><?php if(!$pet) { print 'Enregistrer mon animal'; } else { print 'Modifier mon animal'; } ?></h3>

        <form id="animal-form" action="" method="POST">

            <label for="name">Nom<span class="required">*</span></label>
            <input type="text" name="name" value="<?php if(isset($_POST['name'])) { print $_POST['name']; } elseif($pet) { print $pet['name']; } ?>" /><br />

            <label for="type">Type<span class="required">*</span></label>
            <select name="type">
                <option value="<?php print TYPE_PET_CAT; ?>" <?php if((isset($_POST['type']) && $_POST['type'] == TYPE_PET_CAT) || ($pet && $pet['type'] == TYPE_PET_CAT)) { print 'selected="selected"'; } ?>>Chat</option>
                <option value="<?php print TYPE_PET_DOG; ?>" <?php if((isset($_POST['type']) && $_POST['type'] == TYPE_PET_DOG) || ($pet && $pet['type'] == TYPE_PET_DOG)) { print 'selected="selected"'; } ?>>Chien</option>
                <option value="<?php print TYPE_PET_BIRD; ?>" <?php if((isset($_POST['type']) && $_POST['type'] == TYPE_PET_BIRD) || ($pet && $pet['type'] == TYPE_PET_BIRD)) { print 'selected="selected"'; } ?>>Oiseau</option>
                <option value="<?php print TYPE_PET_RODENT; ?>" <?php if((isset($_POST['type']) && $_POST['type'] == TYPE_PET_RODENT) || ($pet && $pet['type'] == TYPE_PET_RODENT)) { print 'selected="selected"'; } ?>>Rongeur</option>
                <option value="<?php print TYPE_PET_FISH; ?>" <?php if((isset($_POST['type']) && $_POST['type'] == TYPE_PET_FISH) || ($pet && $pet['type'] == TYPE_PET_FISH)) { print 'selected="selected"'; } ?>>Poisson</option>
                <option value="<?php print TYPE_PET_OTHER; ?>" <?php if((isset($_POST['type']) && $_POST['type'] == TYPE_PET_OTHER) || ($pet && $pet['type'] == TYPE_PET_OTHER)) { print 'selected="selected"'; } ?>>Autre</option>
            </select><br />

            <label for="race">Race</label>
            <input type="text" name="race" value="<?php if(isset($_POST['race'])) { print $_POST['race']; } elseif($pet) { print $pet['race']; } ?>" /><br />

            <label for="age">Âge<span class="required">*</span></label>
            <input type="text" name="age" maxlength="3" size="3" value="<?php if(isset($_POST['age'])) { print $_POST['age']; } elseif($pet) { print $pet['age']; } ?>" />

            <select class="agetype" name="agetype">
                <option value="<?php print TYPE_AGE_MONTH; ?>">mois</option>
                <option value="<?php print TYPE_AGE_YEAR; ?>">an(s)</option>
            </select>

            <br />

            <label for="gender">Sexe<span class="required">*</span></label>
            <select name="gender">
                <option value="female" <?php if((isset($_POST['gender']) && $_POST['gender'] == 'female') || ($pet && $pet['gender'] == 'female')) { print 'selected="selected"'; } ?>>Femelle</option>
                <option value="male" <?php if((isset($_POST['gender']) && $_POST['gender'] == 'male') || ($pet && $pet['gender'] == 'male')) { print 'selected="selected"'; } ?>>Mâle</option>
            </select><br />

            <label for="food">Type de nourriture</label>
            <input type="text" name="food" value="<?php if(isset($_POST['food'])) { print $_POST['food']; } elseif($pet) { print $pet['food']; } ?>" /><br />

            <label for="particularity">Particularité</label>
            <input type="text" placeholder="Pucé, vacciné,..." name="particularity" value="<?php if(isset($_POST['particularity'])) { print $_POST['particularity']; } elseif($pet) { print $pet['particularity']; } ?>" /><br />

            <!--<input type="checkbox" name="vaccine" <?php if(isset($_POST['vaccine']) || $pet['vaccine'] == '1') { print 'checked="checked"'; } ?> /><label for="vaccine">Vaccins en ordre</label><br />-->

            <label for="health">Santé</label>
            <select name="health">
                <option value="<?php print PET_HEALTH_GOOD; ?>" <?php if((isset($_POST['health']) && $_POST['health'] == PET_HEALTH_GOOD) || ($pet && $pet['health'] == PET_HEALTH_GOOD)) { print 'selected="selected"'; } ?>>En bonne santé</option>
                <option value="<?php print PET_HEALTH_BAD; ?>" <?php if((isset($_POST['health']) && $_POST['health'] == PET_HEALTH_BAD) || ($pet && $pet['health'] == PET_HEALTH_BAD)) { print 'selected="selected"'; } ?>>Nécessite des soins</option>
            </select><br />

            <label for="comment">Informations supplémentaires</label>
            <textarea placeholder="Note à savoir sur votre animal" name="comment" value="<?php if(isset($_POST['comment'])) { print $_POST['comment']; } elseif($pet) { print $pet['comment']; } ?>" /></textarea><br />

            <input type="submit" value="<?php if(!$pet) { print 'Enregistrer mon animal'; } else { print 'Modifier mon animal'; } ?>" />
        </form>

    </div><!-- end container -->
</div><!-- end content -->

<?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
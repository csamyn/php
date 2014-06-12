<?php
require_once __DIR__ . "/inc/config.inc.php";

if(!isAuthenticated()) {
    header('Location: index.php');
    exit;
}

$errors = array();

$user = loadUser($_SESSION['user']['id']);

if(count($_POST) > 0) {
    if(isset($_POST['email']) && isset($_POST['city'])) {
        $email = $_POST['email'];
        $city = $_POST['city'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $age = intval($_POST['age']);
        $accomodation = intval($_POST['accomodation']);

        if(isset($_POST['interest_cat'])) { $interest_cat = 1; } else { $interest_cat = 0; }
        if(isset($_POST['interest_dog'])) { $interest_dog = 1; } else { $interest_dog = 0; }
        if(isset($_POST['interest_rodent'])) { $interest_rodent = 1; } else { $interest_rodent = 0; }
        if(isset($_POST['interest_bird'])) { $interest_bird = 1; } else { $interest_bird = 0; }
        if(isset($_POST['interest_fish'])) { $interest_fish = 1; } else { $interest_fish = 0; }
        if(isset($_POST['interest_other'])) { $interest_other = 1; } else { $interest_other = 0; }

        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $newpassword2 = $_POST['newpassword2'];

        $params = array(
            'id' => $user['id'],
            'email' => $email,
            'city' => $city,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'phone' => $phone,
            'address' => $address,
            'age' => $age,
            'accommodation' => $accomodation,
            'interest_cat' => $interest_cat,
            'interest_dog' => $interest_dog,
            'interest_rodent' => $interest_rodent,
            'interest_bird' => $interest_bird,
            'interest_fish' => $interest_fish,
            'interest_other' => $interest_other,
        );

        if(md5($oldpassword) == $user['password']) {
            if($newpassword2 == $newpassword) {
                $params['password']= md5($newpassword);
            }
        }

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $ok = updateUser($params);

            if($ok) {
                $_SESSION['message'][] = 'Votre profil a été correctement modifié';
                header('Location: profil.php');
                exit;
            } else {
                $errors[] = 'Une erreur est survenue, veuillez réessayer ultérieurement.';
            }
        } else {
            $errors[] = 'L\'adresse email ne semble pas valide.';
        }

    } else {
        $errors[] = 'Les champs marqués d\'une étoile sont obligatoires.';
    }
}

$h3Title = 'Modifier mon profil';
if(isset($_GET['origin']) && $_GET['origin'] == 'register') {
    $h3Title = 'Compléter mon profil';
}

?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "register"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

<div id="content" class="user-form">
    <div class="container">

        <?php include __DIR__ . "/inc/partial/form_errors.inc.php"; ?>

        <div class="col-left">

        <h3><?php print $h3Title; ?></h3>

        <form id="animal-form" action="" method="POST">

            <label for="email">E-mail<span class="required">*</span></label>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) { print $_POST['email']; } elseif($user) { print $user['email']; } ?>" /><br />

            <label for="city">Ville<span class="required">*</span></label>
            <select name="city">
                <?php
                if(isset($_POST['city'])) { $currentCity = $_POST['city']; } elseif(isset($user['city'])) { $currentCity = $user['city']; } else { $currentCity = null; }
                print getCities(true, $currentCity);
                ?>
            </select><br />

            <label for="firstname">Prénom</label>
            <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) { print $_POST['firstname']; } elseif($user) { print $user['firstname']; } ?>" /><br />

            <label for="firstname">Nom</label>
            <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) { print $_POST['lastname']; } elseif($user) { print $user['lastname']; } ?>" /><br />

            <label for="age">Âge</label>
            <input type="text" name="age" value="<?php if(isset($_POST['age'])) { print $_POST['age']; } elseif($user) { print $user['age']; } ?>" />ans<br />

            <label for="phone">Téléphone</label>
            <input type="text" name="phone" value="<?php if(isset($_POST['phone'])) { print $_POST['phone']; } elseif($user) { print $user['phone']; } ?>" /><br />

            <!--<label for="address">Adresse</label>
            <input type="text" name="address" value="<?php if(isset($_POST['address'])) { print $_POST['address']; } elseif($user) { print $user['address']; } ?>" /><br />-->

            <label for="accomodation">Habitat</label>
            <select name="accomodation">
                <option value="<?php print ACCOMODATION_HOUSE; ?>"><?php print _getAccomodation(ACCOMODATION_HOUSE); ?></option>
                <option value="<?php print ACCOMODATION_APPARTEMENT; ?>"><?php print _getAccomodation(ACCOMODATION_APPARTEMENT); ?></option>
                <option value="<?php print ACCOMODATION_OTHER; ?>"><?php print _getAccomodation(ACCOMODATION_OTHER); ?></option>
            </select><br />

            <label for="interest">Intérêt pour :</label>
            <ul class="animal">

                <li>
                <input type="checkbox" id="interest_cat" name="interest_cat" <?php if(isset($_POST['interest_cat']) || $user['interest_cat']) { print 'checked="checked"'; } ?> /> 
                <label for="interest_cat">Chats</label>
                <li>

                <li>    
                <input type="checkbox" id="interest_dog" name="interest_dog" <?php if(isset($_POST['interest_dog']) || $user['interest_dog']) { print 'checked="checked"'; } ?> /> 
                <label for="interest_dog">Chiens</label>
                </li>

                <li>
                <input type="checkbox" id="interest_rodent" name="interest_rodent" <?php if(isset($_POST['interest_rodent']) || $user['interest_rodent']) { print 'checked="checked"'; } ?> /> 
                <label for="interest_rodent">Rongeurs</label>
                </li><br />

                <li>
                <input type="checkbox" id="interest_bird" name="interest_bird" <?php if(isset($_POST['interest_bird']) || $user['interest_bird']) { print 'checked="checked"'; } ?> /> 
                <label for="interest_bird">Oiseaux</label>
                </li>

                <li>
                <input type="checkbox" id="interest_fish" name="interest_fish" <?php if(isset($_POST['interest_fish']) || $user['interest_fish']) { print 'checked="checked"'; } ?> /> 
                <label for="interest_fish">Poissons</label>
                </li>

                <li>
                <input type="checkbox" id="interest_other" name="interest_other" <?php if(isset($_POST['interest_other']) || $user['interest_other']) { print 'checked="checked"'; } ?> /> 
                <label for="interest_other">Autres</label>
                </li>

            </ul>

            </div><!-- end col-left -->

            <div class="col-right">
            <h3>Changer mon mot de passe :</h3>

            <label for="oldpassword">Ancien mot de passe</label>
            <input type="password" name="oldpassword" /><br />
            <label for="newpassword">Nouveau mot de passe</label>
            <input type="password" name="newpassword" /><br />
            <label for="newpassword2">Répeter le mot de passe</label>
            <input type="password" name="newpassword2" />

            </div><!-- end col-right -->
            <div class="clearfix"></div>
            <input type="submit" value="Modifier mon profil" />

        </form>

    </div><!-- end container -->
</div><!-- end content -->

<?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
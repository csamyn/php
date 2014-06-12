<?php

    require_once __DIR__ . "/inc/config.inc.php";

    $errors = array();

    if(count($_POST) > 0) {

        if($_POST['form_submitted'] == 'form_connect') {
            // Connect form
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = checkCredentials($username, $password);

            if($user) {
                $_SESSION['logged_in'] = true;
                $_SESSION['message'][] = 'Vous êtes connecté !';

                $_SESSION['user'] = array(
                    'id' => $user['id'],
                    'type' => $user['type'],
                    'username' => $username,
                    'email' => $user['email'],
                    'city' => $user['city']
                );

                if(isset($_GET['redirectprofil'])) {
                    $id = intval($_GET['redirectprofil']);
                    header('Location: profil.php?id=' . $id);
                } elseif(isset($_GET['redirectanimal'])) {
                    $id = intval($_GET['redirectanimal']);
                    header('Location: profil_animal.php?id=' . $id);
                } else {
                    header('Location: index.php');
                }
            } else {
                $errors[] = 'Aucun utilisateur ne correspond à ce pseudo/mot de passe.';
            }

        } elseif($_POST['form_submitted'] == 'form_register') {
            // Register form

            // Required fields
            if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['city']) && !empty($_POST['type'])) {
                $username = _cleanText($_POST['username']);
                $mail = $_POST['mail'];
                $password = $_POST['password'];
                $city = _cleanText($_POST['city']);
                $type = $_POST['type'];

                // Check if email is valid
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    // Check if username or email is not already taken
                    $existing = searchUser($username, $mail);

                    if(count($existing) == 0) {
                        $date = new DateTime('now');
                        $date = $date->format('Y-m-d H:i:s');

                        $params = array(
                            'username' => $username,
                            'email' => $mail,
                            'password' => md5($password),
                            'city' => $city,
                            'type' => $type,
                            'created_at' => $date,
                        );

                        $ok = createUser($params);

                        if($ok) {
                            $_SESSION['logged_in'] = true;
                            //$_SESSION['message'][] = 'Vous êtes désormais inscrit et connecté !';

                            $_SESSION['user'] = array(
                                'id' => $ok,
                                'type' => $type,
                                'username' => $username,
                                'email' => $mail,
                                'city' => $city
                            );

                            if(isset($_GET['redirectprofil'])) {
                                $id = intval($_GET['redirectprofil']);
                                header('Location: profil.php?id=' . $id);
                            } elseif(isset($_GET['redirectanimal'])) {
                                $id = intval($_GET['redirectanimal']);
                                header('Location: profil_animal.php?id=' . $id);
                            } elseif($type == TYPE_USER_PET_OWNER || $type == TYPE_USER_BOTH) {
                                header('Location: animal.php');
                            } else {
                                header('Location: modifier_profil.php?origin=register');
                            }
                            exit;
                        } else {
                            $errors[] = 'Une erreur s\'est produite lors de l\'enregistrement, veuillez réessayer plus tard.';
                        }
                    } else {
                        $errors[] = 'Un utilisateur avec cet email ou ce nom d\'utilisateur existe déjà.';
                    }
                } else {
                    $errors[] = 'L\'adresse e-mail semble incorrecte.';
                }

            } else {
                $errors[] = 'Les champs marqués d\'une étoile sont obligatoires.';
            }
        }
    }
?>

<html>

<head>
    <?php include __DIR__ . "/inc/partial/head.inc.php"; ?>
</head>

<body>

<?php $pageActive = "register"; include __DIR__ . "/inc/partial/header.inc.php"; ?>

<div id="content">
    <div class="container">

        <div class="register-col-left">
            <h3>Connexion</h3>
            <?php if(isset($_POST['form_submitted']) && $_POST['form_submitted'] == 'form_connect') include __DIR__ . "/inc/partial/form_errors.inc.php"; ?>
            <form id="connect-form" action="" method="POST">
                <input type="text" placeholder="Pseudo" name="username" id="username" /><br />
                <input type="password" placeholder="Mot de passe" name="password" id="password" /><br />
                <input type="hidden" name="form_submitted" value="form_connect" /><br />
                <input type="checkbox" id="rememberme" name="rememberme" /><label for="rememberme">Se souvenir de moi</label><br />

                <a href="#">Mot de passe oublié ?</a>

                <input type="submit" value="Se connecter" />
            </form>
        </div>

        <div class="register-col-right">
            <h3>Inscription</h3>

            <?php if(isset($_POST['form_submitted']) && $_POST['form_submitted'] == 'form_register') include __DIR__ . "/inc/partial/form_errors.inc.php"; ?>

            <form id="register-form" action="" method="POST">
                <label for="username">Pseudo<span class="required">*</span></label>
                <input type="text" name="username" value="<?php if(isset($_POST['username'])) { print $_POST['username']; } ?>" /><br />

                <label for="mail">Adresse e-mail<span class="required">*</span></label>
                <input type="text" name="mail" value="<?php if(isset($_POST['mail'])) { print $_POST['mail']; } ?>" /><br />

                <label for="mot de passe">Mot de passe<span class="required">*</span></label>
                <input type="password" name="password" /><br />

                <label for="city">Ville<span class="required">*</span></label>
                <select name="city">
                <?php
                    if(isset($_POST['city'])) { $currentCity = $_POST['city']; } else { $currentCity = null; }
                    print getCities(true, $currentCity);
                ?>
                </select><br />

                <label for="type">Je souhaite<span class="required">*</span></label>
                <select name="type">
                    <option value="<?php print TYPE_USER_PET_OWNER; ?>" <?php if(isset($_POST['type']) && $_POST['type'] == TYPE_USER_PET_OWNER) { print 'selected="selected"'; } ?>>Faire garder mon animal</option>
                    <option value="<?php print TYPE_USER_PET_SITTER; ?>" <?php if(isset($_POST['type']) && $_POST['type'] == TYPE_USER_PET_SITTER) { print 'selected="selected"'; } ?>>Garder des animaux</option>
                    <option value="<?php print TYPE_USER_BOTH; ?>" <?php if(isset($_POST['type']) && $_POST['type'] == TYPE_USER_BOTH) { print 'selected="selected"'; } ?>>Les deux</option>
                </select>


                <input type="hidden" name="form_submitted" value="form_register" />
                <input type="submit" value="S'inscrire" />
            </form>
        </div>

    </div><!-- end container -->
</div><!-- end content -->

<?php include __DIR__ . "/inc/partial/footer.inc.php" ?>

</body>

</html>
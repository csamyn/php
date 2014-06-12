<?php

    require_once __DIR__ . '/inc/config.inc.php';

    session_destroy();

    foreach($_SESSION as $key => $session)
        unset($_SESSION[$key]);

    header('Location: index.php');
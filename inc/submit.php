<?php

	$prenom = $_POST['prenom'];
	$mail = $_POST['email'];
	$message = $_POST['message'];

	if($prenom == '' || $mail == '' || $message == '') {
		echo 'missing';
	} else {

		$body = '';

		$body .= 'Prénom : ' . $prenom . '<br />';
		$body .= 'E-mail : ' . $mail . '<br /><br />';
		$body .= 'Message : ' . $message . '<br />';

		$ok = mail('celia.samyn@gmail.com', 'Un nouveau message du site trop cool !', $body, 'Content-Type: text/html; charset="UTF-8";');

		$ok = true;

		if($ok) {
			echo 'ok';
		} else {
			echo 'error';
		}
	}
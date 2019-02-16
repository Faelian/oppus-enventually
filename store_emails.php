<?php
	if (isset ($_POST['email'])) {

		# on vérifie qu'il s'agit d'une adresse mail valide
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			# l'adresse est enregistrée dans emails.txt
			# /!\ protéger le fichier emails.txt avec un .htaccess
			$email = $_POST['email'] . "\r\n";
			$ret = file_put_contents('./emails.txt', $email , FILE_APPEND | LOCK_EX);

			if ($ret === false) {
				die("Impossible d'écrire dans le fichier");
			} else {
				echo 'oki doki !';
			}


		} else {
			echo 'adresse mail non valide';
		}
	}
?>
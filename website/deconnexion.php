<?php
	session_start();
	session_destroy();
	header('Location: http://localhost/leon/website/connexion.php');
<?php
	session_start();
	session_unset();
	session_destroy();
	header('Location: ../escolher_diretoria.php');
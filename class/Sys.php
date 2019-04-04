<meta charset="utf-8">
<?php
	class Sys {

		private $dbHost = "localhost";
		private $dbUser = "root";
		private $dbPassword = "usbw";
		private $dbName = "db_gamification";

		private $dbConnection = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

	}
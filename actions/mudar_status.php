<?php
	include_once '../class/Sys.php';
	$sys = new Sys();
	if(isset($_GET['tb']) and isset($_GET['cd']) and isset($_GET['local']) and !empty($_GET['tb']) and !empty($_GET['cd']) and !empty($_GET['local'])){
		$sys->mudarStatus($_GET['tb'], $_GET['cd']);
	}
	header('Location: '.$_GET['local']);

<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['nm_cargo'])){
    $nm_cargo = $_POST['nm_cargo'];
    $sys->cadastrarCargo($nm_cargo);
  }
?>
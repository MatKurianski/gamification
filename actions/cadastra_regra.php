<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['ds_regra']) and isset($_POST['qt_pontos'])){
    $ds_regra = $_POST['ds_regra'];
    $qt_pontos = $_POST['qt_pontos'];
		$sys->cadastrarRegra($ds_regra, $qt_pontos);
  }
?>
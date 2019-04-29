<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['nm_diretoria']) and isset($_POST['ds_cor'])){
    $nm_diretoria = $_POST['nm_diretoria'];
    $ds_cor = $_POST['ds_cor'];
    $sys->cadastrarDiretoria($nm_diretoria, $ds_cor);
  }
?>
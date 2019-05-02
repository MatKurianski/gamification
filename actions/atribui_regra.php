<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['cd_membro']) and isset($_POST['cd_regra'])){
    $cd_membro = $_POST['cd_membro'];
    $cd_regra = $_POST['cd_regra'];
    $sys->atribuirPonto($cd_membro, $cd_regra);
  }
  header('Location: /pages/admin/membros.php');
?>
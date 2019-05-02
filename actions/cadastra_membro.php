<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['nm_membro']) and isset($_POST['tx_senha']) and isset($_POST['cd_cargo']) and isset($_POST['cd_diretoria'])){
    $nm_membro = $_POST['nm_membro'];
    $tx_senha = $_POST['tx_senha'];
    $cd_cargo = $_POST['cd_cargo'];
    $cd_diretoria = $_POST['cd_diretoria'];
    
    $sys->cadastrarMembro($nm_membro, $tx_senha, $cd_cargo, $cd_diretoria);
  }
  header("Location: /pages/admin/membros.php");
?>
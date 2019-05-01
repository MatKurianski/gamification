<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['nm_membro']) and isset($_POST['nm_usuario']) and isset($_POST['cd_cargo']) and isset($_POST['cd_diretoria'])){
    $nm_membro = $_POST['nm_membro'];
    $nm_usuario = $_POST['nm_usuario'];
    $cd_cargo = $_POST['cd_cargo'];
    $cd_diretoria = $_POST['cd_diretoria'];
    
    $sys->cadastrarMembro($nm_usuario, 1234, $cd_cargo, $cd_diretoria);
  }
  header("Location: /pages/admin/membros.php");
?>
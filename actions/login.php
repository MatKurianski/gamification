<?php
	include '../class/Sys.php';
	$sys = new Sys;
	if(isset($_POST['cd_user']) and isset($_POST['tx_senha'])){
		$logar = $sys->login($_POST['cd_user'], $_POST['tx_senha']);
		if($logar == 0){
			echo "logado como ".$_SESSION['nm_membro'];
			echo "<a href='logout.php'>Sair</a>";
		}
		else if($logar == 1){
			echo "Não foi possível fazer login, tente novamente mais tarde";
			echo "<a href='../escolher_diretoria.php'>Início</a>";
		}
		else if($logar == 2){
			echo "Usuário ou senha incorretos";
			echo "<a href='../escolher_diretoria.php'>Início</a>";
    }
    header("Location: /pages/perfil/historico.php");
	}
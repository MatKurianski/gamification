<?php
	include 'class/Sys.php';
	$sys = new Sys;
	if(isset($_GET['cd'])){
		$query = $sys->listarMembros($_GET['cd']);
		if(!empty($query)){
			$membro = $query->fetch_object();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1><?php echo $membro->nm_membro;?></h1>
		<h2><?php echo $membro->nm_cargo ?></h2>
		<form method="post" action='actions/login.php'>
			<input type="hidden" name="cd_user" value="<?php echo $membro->cd_membro ?>">
			<input type="password" name="tx_senha">
			<input type="submit" value="Entrar">
		</form>
		<?php
			if(isset($_GET['diretoria'])){
				echo "<a href='escolher_membro.php?cd=".$_GET['diretoria'];
			}
			else{
				echo "<a href='escolher_diretoria.php'>";
			}
		?>
			<button>Voltar</button>
		</a>
	</body>
</html>
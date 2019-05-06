<?php
	include '../../class/Sys.php';
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
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Faça login</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="theme-color" content="#2c125e">
	    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
	    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/login.css">
	    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/select.css">
	</head>
	<body style="display: flex; justify-content: center; align-items: center">
		<div>
			<h1 style="text-align: center; font-family: PressStart; padding: 10px; color: white"><?php echo $membro->nm_membro;?></h1>
			<h2 style="text-align: center; font-family: PressStart; padding: 10px; color: white"><?php echo $membro->nm_cargo ?></h2>
			<form method="post" action='/actions/login.php'>
				<input type="hidden" name="cd_user" value="<?php echo $membro->cd_membro ?>">
				<p style="display: flex; justify-content: center">
					<input type="password" name="tx_senha" style="margin: 5px; font-size: 20px">
				</p>
				<p style="display: flex; justify-content: center">
					<input type="submit" value="Entrar" style="margin: 10px; padding: 5px;">
				</p>
			</form>
		</div>
	</body>
</html>
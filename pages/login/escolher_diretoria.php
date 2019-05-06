<?php
	include '../../class/Sys.php';
	$sys = new Sys;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <title>Faça login</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="theme-color" content="#2c125e">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="/css/pages/guild.css">
		<link rel="stylesheet" type="text/css" href="/css/common.css">
	</head>
	<body>
		<h1 class="frase">Escolha sua área!</h1>
		<?php
			$query = $sys->listarDiretorias();
			if(!empty($query)){
				while($diretoria = $query->fetch_object()){
					if($diretoria->st_diretoria){
						echo "<a class='botao' href='/pages/login/escolher_membro.php?cd=$diretoria->cd_diretoria' style='background-color: $diretoria->ds_cor'>";
						echo $diretoria->nm_diretoria;
						echo "</a>";
					}
				}
			}
		?>
	</body>
</html>
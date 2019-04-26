<?php
	include 'class/Sys.php';
	$sys = new Sys;
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/pages/guild.css">
		<link rel="stylesheet" type="text/css" href="css/common.css">
	</head>
	<body>
		<h1>Escolha a diretoria</h1>
		<?php
			$query = $sys->listarDiretorias();
			if(!empty($query)){
				while($diretoria = $query->fetch_object()){
					echo "<a class='botao' href='pages/select.php?cd=$diretoria->cd_diretoria' style='background-color: $diretoria->ds_cor'>";
					echo $diretoria->nm_diretoria;
					echo "</a><br>";
				}
			}
		?>
	</body>
</html>
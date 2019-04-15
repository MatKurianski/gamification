<?php
	include 'class/Sys.php';
	$sys = new Sys;
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>Escolha a diretoria</h1>
		<?php
			$query = $sys->listarDiretorias();
			if(!empty($query)){
				while($diretoria = $query->fetch_object()){
					echo "<a href='escolher_membro.php?cd=$diretoria->cd_diretoria'>";
					echo $diretoria->nm_diretoria;
					echo "</a><br>";
				}
			}
		?>
	</body>
</html>
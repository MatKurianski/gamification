<?php
	include 'class/Sys.php';
	$sys = new Sys;
	if(isset($_GET['cd'])){
		$query = $sys->listarDiretorias($_GET['cd']);
		if(!empty($query)){
			$diretoria = $query->fetch_object();
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
		<style type="text/css">
			.flex-container{
				display: flex;
			}
			.membro{
				width:200px;
				box-shadow: 0 0 4px 0 rgba(0, 0, 0, 0.5);
				margin: 20px;
			}
			.membro:hover{
				box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.7);
			}
			.membro input[type='radio']{
				display: none;
			}
			.membro input[type='radio']+label:hover{
				cursor: pointer;
				text-decoration: underline;
			}
			.membro input[type='radio']:checked+label{
				color: tomato;
				text-decoration: underline;
			}
			.membro span{
				display: block;
				width: 100%;
				text-align: center;
			}
			.membro .foto{
				width: 100%;
				height: 100px;
				background-image: url('res/img/sintese.png');
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center;
			}
		</style>
	</head>
	<body>
		<h1>Escolha o membro</h1>
		<form method="post" action='actions/login.php'>
			<div class='flex-container'>
				<?php
					if(isset($_GET['cd'])){
						$query = $sys->listarMembrosPorDiretoria($_GET['cd']);
						if(!empty($query)){
							while($membro = $query->fetch_object()){
								echo "<a href='login_sozinho.php?cd=$membro->cd_membro&diretoria=$diretoria->cd_diretoria' class='membro'>";
								// echo "<input type='radio' name='cd_user' value='$membro->cd_membro' id='membro_$membro->cd_membro'>";
								// echo "<label for='membro_$membro->cd_membro'>";
								echo "<span>$membro->nm_membro</span>";
								echo "<div class='foto'></div>";
								echo "<span>$membro->nm_cargo</span>";
								// echo "</label>";
								echo "</a>";
							}
						}
						else{
							echo "Sem membros na diretoria $diretoria->nm_diretoria <br>";
						}
					}
				?>
			</div>
			<!-- <input type="password" name="tx_senha"> -->
			<!-- <input type="submit" value="Entrar"> -->
		</form>
		<a href="escolher_diretoria.php">
			<button>Voltar</button>
		</a>
	</body>
</html>
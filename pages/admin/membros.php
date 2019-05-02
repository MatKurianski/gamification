<?php 
    include '../../class/Sys.php'; 
    $sys = new Sys();
    $membros = $sys->listarMembros();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sintese Game Jr. | Membros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/painel.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/admin/cadastro.css">
</head>
<body>
    <div class="container">
      <?php include '../../res/components/sidebar.php'; ?>
        <div class="conteudo">
            <?php
                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
            ?>
			<div class="corpo">
    			<h3>
    				Atribuir conquista a membro
    			</h3>
    			<form method="post" action="/actions/atribui_regra.php" id="form">
    				<table>
						<tr>
							<th>
								Nome do membro
							</th>
							<th>
								Regra
							</th>
						</tr>
						<tr>
							<td>
								<select name="cd_membro">
								<?php
										$membros_opcoes = $sys->listarMembros();

                                        $counter = 0;
										if(!empty($membros_opcoes)) {
											while($membro = $membros_opcoes->fetch_object()) { 
                                                if($membro->st_membro){
												 echo "<option value=$membro->cd_membro>$membro->nm_membro</option>";
                                                 $counter++;
                                                }
											}
										}
                                        if($counter == 0){
                                            echo "<option disabled>Sem membros</options>";
                                        }
								?>
								</select>
							</td>
							<td>
								<select name="cd_regra">
									<?php 
										$regras = $sys->listarRegras();

                                        $counter = 0;
										if(!empty($regras)) {
											while($regra = $regras->fetch_object()) {
                                                if($regra->st_regra){
												 echo "<option value=$regra->cd_regra>$regra->ds_regra</option>";
                                                 $counter++;
                                                }
											}
										}
                                        if($counter == 0){
                                            echo "<option disabled>Sem Regras</option>";
                                        }
									?>
								</select>
							</td>
						</tr>
						<tr>
						  <td colspan=2>
								<button type="submit" class="enviar">Atribuir!</button>
							</td>
						</tr>
					</table>
				</form>
			</div>
            <?php
                }
            ?>
			<br /><br />
            <div class="corpo">
                <div class="lista">
                    <h3>
                        Membros atuais
                    </h3>
                    <table>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                Cargo
                            </th>
                            <th>
                                Diretoria
                            </th>
                            <th>
                                Ativo?
                            </th>
                            <?php
                                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                                    echo "<th></th>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php
                                if(!empty($membros)) {
                                    while($membro = $membros->fetch_object()) {
                                      $cargo = $sys->listarCargos($membro->id_cargo)->fetch_object();
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<p>$membro->nm_membro</p>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<p>$cargo->nm_cargo</p>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<p>$membro->nm_diretoria</p>";
                                            echo "</td>";
                                            if($membro->st_membro){
                                                echo "<td>";
                                                    echo "<p style='color: green'>Sim</p>";
                                                echo "</td>";
                                                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                                                    echo "<td>";
                                                        echo "<a href='/actions/mudar_status.php?tb=membro&cd=$membro->cd_membro&local=/pages/admin/membros.php'>Desativar</a>";
                                                    echo "</td>";
                                                }
                                            }
                                            else{
                                                echo "<td>";
                                                    echo "<p style='color: red'>Não</p>";
                                                echo "</td>";
                                                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                                                    echo "<td>";
                                                        echo "<a href='/actions/mudar_status.php?tb=membro&cd=$membro->cd_membro&local=/pages/admin/membros.php'>Ativar</a>";
                                                    echo "</td>";
                                                }
                                            }
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <?php
                    if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                ?>
                <hr />
                <form method="post" action="/actions/cadastra_membro.php" id="form">
                    <h3 onclick="toggleAdc()" class="texto-adicionar">
                        Adicionar novo membro
                    </h3>
                    <table id="tabela-adicionar" class="">
                        <tr>
                            <th>Nome do membro</th>
                            <th>Senha</th>
                            <th>Cargo</th>
                            <th>Diretoria</th>
                        </tr>
                        <tr>
                            <td>
                                <input name="nm_membro" class="input-nome" placeholder="Escreva o nome completo">
                            </td>
                            <td>
                                <input name="tx_senha" class="input-nome" placeholder="Escreva a senha">
                            </td>
                            <td>
                                <select name="cd_cargo">
                                  <?php 
                                      $cargos = $sys->listarCargos();
                                      if(!empty($cargos)) {
                                        while($cargo = $cargos->fetch_object()) {
                                          echo "<option value=\"$cargo->cd_cargo\">$cargo->nm_cargo</option>";
                                        }
                                      }
                                  ?>
                                </select>
                            </td>
                            <td>
                                <select name="cd_diretoria">
                                  <?php 
                                      $diretorias = $sys->listarDiretorias();
                                      if(!empty($diretorias)) {
                                        while($diretoria = $diretorias->fetch_object()) {
                                          echo "<option value=\"$diretoria->cd_diretoria\">$diretoria->nm_diretoria</option>";
                                        }
                                      }
                                  ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>
                                <button type="submit" class="enviar">Enviar</button>
                            </td>
                        </tr>
                    </table>
                </form>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <script src="/js/admin/adicionar.js"></script>
</body>
</html>

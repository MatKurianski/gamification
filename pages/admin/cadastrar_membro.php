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
    <title>Sintese Game Jr.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/painel.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/admin/cadastro.css">
</head>
<body>
    <div class="container">
      <?php include '../../res/components/sidebar.php'; ?>
        <div class="conteudo">
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
                                Usuário
                            </th>
                            <th>
                                Cargo
                            </th>
                            <th>
                                Ativo
                            </th>
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
                                                echo "<p>$membro->nm_usuario</p>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<p>$cargo->nm_cargo</p>";
                                            echo "</td>";
                                            echo "<td>";
                                                if($membro->st_membro) echo "Sim";
                                                else echo "Nao";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <hr />
                <form method="post" action="/actions/cadastra_membro.php" id="form">
                    <h3 onclick="toggleAdc()" class="texto-adicionar">
                        Adicionar novo membro
                    </h3>
                    <table id="tabela-adicionar" class="">
                        <tr>
                            <th>Nome do membro</th>
                            <th>Nome de usuario</th>
                            <th>Cargo</th>
                            <th>Diretoria</th>
                        </tr>
                        <tr>
                            <td>
                                <input name="nm_membro" class="input-nome" placeholder="Escreva o nome completo"></input>
                            </td>
                            <td>
                                <input name="nm_usuario" class="input-nome" placeholder="Escreva o nome de usuário"></input>
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
            </div>
        </div>
    </div>
    <script src="/js/admin/adicionar.js"></script>
</body>
</html>

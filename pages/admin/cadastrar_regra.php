<?php 
    include '../../class/Sys.php'; 
    $sys = new Sys();
    $regras = $sys->listarRegras();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sintese Game Jr. | Regras</title>
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
                        Regras atuais
                    </h3>
                    <table>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                Pontos
                            </th>
                            <th>
                                Ativa?
                            </th>
                            <?php
                                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                                    echo "<th></th>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                if(!empty($regras)) {
                                    while($regra = $regras->fetch_object()) {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<p>$regra->ds_regra</p>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<p>$regra->qt_pontos</p>";
                                            echo "</td>";
                                            if($regra->st_regra){
                                                echo "<td>";
                                                    echo "<p style='color: green'>Sim</p>";
                                                echo "</td>";
                                                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                                                    echo "<td>";
                                                        echo "<a href='/actions/mudar_status.php?tb=regra&cd=$regra->cd_regra&local=/pages/admin/cadastrar_regra.php'>Desativar</a>";
                                                    echo "</td>";
                                                }
                                            }
                                            else{
                                                echo "<td>";
                                                    echo "<p style='color: red'>Não</p>";
                                                echo "</td>";
                                                if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                                                    echo "<td>";
                                                        echo "<a href='/actions/mudar_status.php?tb=regra&cd=$regra->cd_regra&local=/pages/admin/cadastrar_regra.php'>Ativar</a>";
                                                    echo "</td>";
                                                }
                                            }
                                        echo "</tr>";
                                    }
                                }
                                else{
                                    echo "<tr><td colspan='4'>Sem regras</td><tr>";
                                }
                            ?>
                        </tr>
                    </table>
                </div>
                <?php
                    if($user->id_cargo == 3 or $user->id_cargo == 4 or $user->id_cargo == 5){
                ?>
                <hr />
                <form method="post" action="/actions/cadastra_regra.php" id="form">
                    <h3 onclick="toggleAdc()" class="texto-adicionar">
                        Adicionar nova regra
                    </h3>
                    <table id="tabela-adicionar" class="oculto">
                        <tr>
                            <th>Nome da Regra</th>
                            <th class="pontos">Pontos</th>
                        </tr>
                        <tr>
                            <td>
                                <input name="ds_regra" class="input-nome" placeholder="Escreva a regra aqui" required></input>
                            </td>
                            <td class="pontos">
                                <input name="qt_pontos" value="0" class="input-pontos" type="number"></input>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2>
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

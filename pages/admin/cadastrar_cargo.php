<?php 
    include '../../class/Sys.php'; 
    $sys = new Sys();
    $cargos = $sys->listarCargos();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sintese Game Jr. | Cargos</title>
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
                        Cargos atuais
                    </h3>
                    <table>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                Ativo?
                            </th>
                            <?php
                                if($user->id_cargo == 4 or $user->id_cargo == 5){
                                    echo "<th></th>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <?php 
                                if(!empty($cargos)) {
                                    while($cargo = $cargos->fetch_object()) {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<p>$cargo->nm_cargo</p>";
                                            echo "</td>";
                                            if($cargo->st_cargo){
                                                echo "<td>";
                                                    echo "<p style='color: green'>Sim</p>";
                                                echo "</td>";
                                                if($user->id_cargo == 4 or $user->id_cargo == 5){
                                                    echo "<td>";
                                                        echo "<a href='/actions/mudar_status.php?tb=cargo&cd=$cargo->cd_cargo&local=/pages/admin/cadastrar_cargo.php'>Desativar</a>";
                                                    echo "</td>";
                                                }
                                            }
                                            else{
                                                echo "<td>";
                                                    echo "<p style='color: red'>Não</p>";
                                                echo "</td>";
                                                if($user->id_cargo == 4 or $user->id_cargo == 5){
                                                    echo "<td>";
                                                        echo "<a href='/actions/mudar_status.php?tb=cargo&cd=$cargo->cd_cargo&local=/pages/admin/cadastrar_cargo.php'>Ativar</a>";
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
                    if($user->id_cargo == 4 or $user->id_cargo == 5){
                ?>
                <hr />
                <form method="post" action="/actions/cadastra_cargo.php" id="form">
                    <h3 onclick="toggleAdc()" class="texto-adicionar">
                        Adicionar novo cargo
                    </h3>
                    <table id="tabela-adicionar" class="oculto">
                        <tr>
                            <th>Nome do Cargo</th>
                        </tr>
                        <tr>
                            <td>
                                <input name="nm_cargo" class="input-nome" placeholder="Escreva o nome do cargo aqui"></input>
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

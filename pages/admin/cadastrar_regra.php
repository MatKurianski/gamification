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
                        </tr>
                        <tr>
                            <?php 
                                if(!empty($regras)) {
                                    while($regra = $regras->fetch_object()) {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<input value=\"$regra->ds_regra\"></input>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<input value=\"$regra->qt_pontos\" type=\"number\"></input>";
                                            echo "</td>";
                                            echo "<td>";
                                                if($regra->st_regra) echo "Sim";
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
                                <input name="ds_regra" class="input-nome" placeholder="Escreva o nome da regra aqui"></input>
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
            </div>
        </div>
    </div>
    <script src="/js/admin/adicionar.js"></script>
</body>
</html>

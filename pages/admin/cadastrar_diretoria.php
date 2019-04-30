<?php 
    include '../../class/Sys.php'; 
    $sys = new Sys();
    $diretorias = $sys->listarDiretorias();
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
                        Diretorias atuais
                    </h3>
                    <table>
                        <tr>
                            <th>
                                Nome
                            </th>
                            <th>
                                Cor
                            </th>
                            <th>
                                Ativa?
                            </th>
                        </tr>
                        <tr>
                            <?php 
                                if(!empty($diretorias)) {
                                    while($diretoria = $diretorias->fetch_object()) {
                                        echo "<tr>";
                                            echo "<td>";
                                                echo "<input value=\"$diretoria->nm_diretoria\"></input>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<input style=\"color: $diretoria->ds_cor\" value=\"$diretoria->ds_cor\"></input>";
                                            echo "</td>";
                                            echo "<td>";
                                                if($diretoria->st_diretoria) echo "Sim";
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
                <form method="post" action="/actions/cadastra_diretoria.php" id="form">
                    <h3 onclick="toggleAdc()" class="texto-adicionar">
                        Adicionar nova diretoria
                    </h3>
                    <table id="tabela-adicionar" class="oculto">
                        <tr>
                            <th>Nome da Diretoria</th>
                            <th class="pontos">Cor</th>
                        </tr>
                        <tr>
                            <td>
                                <input name="nm_diretoria" placeholder="Escreva o nome da diretoria aqui"></input>
                            </td>
                            <td>
                                <input type="color" name="ds_cor"></input>
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

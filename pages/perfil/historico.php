<?php 
    include '../../class/Sys.php'; 
    $sys = new Sys();
    $dias = 5;
    $membroCd = 1;
    $periodo = $sys->gerarPeriodo($dias);
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
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/perfil/historico.css">
</head>
<body>
    <div class="container">
        <?php include '../../res/components/sidebar.php'; ?>
        <div class="conteudo">
            <h3>Meu Histórico</h3>
            <h5>(últimos <?php echo $dias; ?> dias)</h5>
            <div class="dados">
                <table class="historico">
                    <tr>
                        <th>Conquista</th>
                        <th>Pontos</th> 
                        <th>Data</th>
                    </tr>
                    <?php
                        $itemHistorico = $sys->listarHistorico($membroCd, $periodo);
                        if(!empty($itemHistorico)){
                            while($dados = $itemHistorico->fetch_object()){
                                echo "<tr>";
                                echo "<td>$dados->conquista</td>";
                                echo "<td>$dados->pontos</td>";
                                echo "<td>$dados->data</td>";
                                echo "</tr>";
                            }
                        }
                        else{
                            echo "<tr><td colspan='3'>Sem conquistas nos últimos $dias dias</td></tr>";
                        }
                    ?>
                </table>
                <table class="historico menor">
                    <tr>
                        <th>Total de Pontos (últimos <?php echo $dias ?> dias)</th> 
                        <th>Total de Pontos (geral)</th>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                $pontos = $sys->contarPontos($membroCd, $periodo); 
                                if(!empty($pontos)){
                                    echo $pontos;
                                }
                                else{
                                    echo "0";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                $pontos = $sys->contarPontos($membroCd); 
                                if(!empty($pontos)){
                                    echo $pontos;
                                }
                                else{
                                    echo "0";
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        const toggle_sidebar = document.getElementById('toggle-sidebar');
        const abas = document.getElementById('abas');
        
        const toggleDashboard = () => {
            const classes = abas.classList;
            if(classes.contains('fechado')) {
                classes.remove('fechado');
                toggle_sidebar.text = '-';
            } else {
                classes.add('fechado');
                toggle_sidebar.text = '+';
            }
        };
    </script>
</body>
</html>

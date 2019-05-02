<?php 
    include_once '../class/Sys.php'; 
    $sys = new Sys();
    $dias = 100;
    $posicoes = 5;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sintese Game Jr. | Ranking</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/painel.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/perfil/historico.css">
</head>
<body>
    <div class="container">
        <?php include '../res/components/sidebar.php'; ?>
        <div class="conteudo">
            <h3>Top <?php echo $posicoes ?></h3>
            <h5>(últimos <?php echo $dias; ?> dias)</h5>
            <div class="dados">
                <table class="historico">
                    <tr>
                        <th>Posição</th>
                        <th>Jogador</th>
                        <th>Pontos</th>
                    </tr>
                    <?php
                        $itemHistorico = $sys->listarHistorico($userCd, $dias);
                        $queryRanking = $sys->listarRanking($posicoes, $dias);
                        if(!empty($queryRanking)){
                            $posicao = 1;
                            while($lugar = $queryRanking->fetch_object()){
                                echo "<tr>";
                                echo "<td>".$posicao."º</td>";
                                echo "<td>$lugar->nome</td>";
                                echo "<td>$lugar->pontos</td>";
                                echo "</tr>";
                                $posicao++;
                            }
                        }
                        else{
                            echo "<tr><td colspan='3'>Sem pontos nos últimos $dias dias</td></tr>";
                        }
                    ?>
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

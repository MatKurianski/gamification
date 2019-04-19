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
        <?php include '../../res/components/navbar.php';?>
        <div class="dashboard">
            <div class="profile">
                <img src="https://cdn3.iconfinder.com/data/icons/user-icon-3-1/100/user_3_Artboard_1_copy_2-512.png" />
                <p>
                    Fulado de Tal
                </p>
            </div>
            <ul id="abas" class="fechado">
                <li class="ativo">
                    <a class="aba" href="#">Início</a>
                </li>
                <li>
                    <a class="aba" href="/pages/perfil/historico.php">Conquistas</a>
                </li>
                <li>
                    <a class="aba" href="">Meu Perfil</a>
                </li>
                <li>
                    <a class="aba" href="#">Sair</a>
                </li>
            </ul>
            <a onclick=toggleDashboard() id="toggle-sidebar">+</a>
        </div>
        <div class="conteudo">
            <h3>Meu Histórico (últimos 30 dias)</h3>
            <div class="dados">
                <table class="historico">
                    <tr>
                        <th>Conquista</th>
                        <th>Pontos</th> 
                        <th>Data</th>
                    </tr>
                    <tr>
                        <td>Chegou a tempo!</td>
                        <td>50</td> 
                        <td>09/04/1590</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                    <tr>
                        <td>Ajudou o próximo!</td>
                        <td>50</td> 
                        <td>09/04/1594</td>
                    </tr>
                </table>
                <table class="historico menor">
                    <tr>
                        <th>Total de Pontos (últimos 30 dias)</th> 
                        <th>Total de Pontos (geral)</th>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>150</td>
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

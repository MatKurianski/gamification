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
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/admin/cadastrar_regra.css">
</head>
<body>
    <div class="container">
        <div class="dashboard">
            <div class="profile">
                <img src="https://cdn3.iconfinder.com/data/icons/user-icon-3-1/100/user_3_Artboard_1_copy_2-512.png" />
                <p>
                    Fulado de Tal
                </p>
            </div>
            <ul id="abas" class="fechado">
                <li>
                    <a class="aba" href="#">Início</a>
                </li>
                <li class="ativo">
                    <a class="aba" href="/pages/perfil/historico.php">Conquistas</a>
                </li>
                <li>
                    <a class="aba" href="">Meu Perfil</a>
                </li>
                <li>
                    Administração
                </li>
                <li>
                    <a class="aba" href="#">Sair</a>
                </li>
            </ul>
            <a onclick=toggleDashboard() id="toggle-sidebar">+</a>
        </div>
        <div class="conteudo">
            <form class="form-regras">
                <h3>
                    Adicionar nova regra:
                </h3>
                <table>
                    <tr>
                        <th>Nome da Regra</th>
                        <th class="pontos">Pontos</th>
                    </tr>
                    <tr> 
                        <td>
                            <input class="input-nome" placeholder="Escreva o nome da regra aqui"></input>
                        </td>
                        <td class="pontos">
                            <input class="input-pontos" type="number"></input>
                        </td>
                    </tr>
                </table>
            </form>
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

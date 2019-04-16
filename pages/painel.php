<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sintese Game Jr.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/painel.css">
</head>
<body>
    <div class="container">
        <?php include '../res/components/navbar.php';?>
        <div class="dashboard">
            <div class="profile">
                <img src="https://cdn3.iconfinder.com/data/icons/user-icon-3-1/100/user_3_Artboard_1_copy_2-512.png" />
                <p>
                    Fulado de Tal
                </p>
            </div>
            <ul id="abas">
                <li class="ativo">Início</li>
                <li>Conquistas</li>
                <li>Meu Perfil</li>
                <li>Sair</li>
            </ul>
            <a onclick=toggleDashboard() id="toggle-sidebar">+</a>
        </div>
        <div class="conteudo">
            
        </div>
    </div>

    <script>
        const toggleDashboard = () => {
            const toggle = document.getElementById('toggle-sidebar');
            const abas = document.getElementById('abas');

            if (abas.style.display === 'none') {
                toggle.text = '-';
                abas.style.display = 'flex';
            } else {
                toggle.text = '+';
                abas.style.display = 'none';
            }
        };
    </script>
</body>
</html>

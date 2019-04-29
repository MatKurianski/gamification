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
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/admin/cadastrar_diretoria.css">
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
                <li>
                    <a class="aba" href="/pages/perfil/historico.php">Conquistas</a>
                </li>
                <li>
                    <a class="aba" href="">Meu Perfil</a>
                </li>
                <li class="ativo">
                    <a class="aba">Administração</a>
                </li>
                <li>
                    <a class="aba" href="#">Sair</a>
                </li>
            </ul>
            <a onclick=toggleDashboard() id="toggle-sidebar">+</a>
        </div>
        <div class="conteudo">
          <div class="area-diretoria">
              <table class="nova-tabela">
              <form>
                <tr>
                  <th>
                    Nome da diretoria
                  </th>
                </tr>
                  <td>
                    <input type="text" placeholder="Insira aqui um nome" id="nome-diretoria" />
                  </td>
                </tr>
                <tr>
                  <th>
                    Cor da diretoria
                  </th>
                </tr>
                <tr>
                  <td>
                    <input type="color" id="color-picker"/>
                  </td>
                </tr>
                <tr>
                <td colspan="2">
                  <button type="submit" class="submit">Enviar</button>
                </td>
                </tr>
                </form>
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

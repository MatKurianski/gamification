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
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/admin/cadastrar_regra.css">
</head>
<body>
    <div class="container">
      <?php include '../../res/components/sidebar.php'; ?>
        <div class="conteudo">
            <div class="regras">
                <div class="lista-regras">
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
                                                echo "<input onclick=\"definirComoModificado($regra->cd_regra)\" value=\"$regra->ds_regra\"></input>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo "<input value=\"$regra->qt_pontos\" type=\"number\"></input>";
                                            echo "</td>";
                                            echo "<td>";
                                                echo $regra->st_regra;
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            ?>
                            <tr>
                                <td colspan=3>
                                    <a href="#" id="update" class="enviar oculto">Atualizar</a>
                                </td>
                            </tr>
                        </tr>
                    </table>
                </div>
                <hr />
                <form method="post" action="/actions/cadastra_regra.php" id="form-regras">
                    <h3 onclick="toggleAdcRegra()" class="texto-adicionar-regra">
                        Adicionar nova regra
                    </h3>
                    <table id="tabela-adicionar-regra" class="oculto">
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

    <script>
        const toggle_sidebar = document.getElementById('toggle-sidebar');
        const abas = document.getElementById('abas');
        const botao_update = document.getElementById('update');

        let modificados = [];

        const definirComoModificado = (cd) => {
            botao_update.classList.remove('oculto');
            const modificados_novo = [...modificados];
            const duplicados = modificados_novo.filter(atual => atual === cd);
            if(duplicados.length !== 0) return;
            modificados_novo.push(cd);
            modificados = modificados_novo;
        };
        
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

        const adc_regra = document.getElementById('tabela-adicionar-regra');

        const toggleAdcRegra = () => {
            adc_regra.classList.remove("oculto");
        };
    </script>
</body>
</html>

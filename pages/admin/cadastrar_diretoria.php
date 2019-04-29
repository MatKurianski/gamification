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
        <?php include '../../res/components/sidebar.php'; ?>
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


</body>
</html>

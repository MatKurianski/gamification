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
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/admin/cadastrar_diretoria.css">
</head>
<body>
    <div class="container">
        <?php include '../../res/components/sidebar.php'; ?>
        <div class="conteudo">
          <div class="area-diretoria">
              <table class="nova-tabela">
                  <tr>
                    <th class="titulo" colspan="2">
                      Diretorias Atuais
                    </th>
                  </tr>
                  <tr>
                    <th>
                      Nome
                    </th>
                    <th>
                      Cor
                    </th>
                  </tr>
                  <?php 
                    if(!empty($diretorias)) {
                      while($diretoria = $diretorias->fetch_object()) {
                          echo "<tr>";
                          echo "<td>";
                              echo "$diretoria->nm_diretoria";
                          echo "</td>";
                          echo "<td>";
                              echo "<span style=\"color: $diretoria->ds_cor\"> $diretoria->ds_cor</span>";
                          echo "</td>";
                          echo "</tr>";
                      }
                  }
                  ?>
              </table>
              <table class="nova-tabela">
              <form method="post" action="/actions/cadastra_diretoria.php">
              <tr>
                  <th class="titulo">
                    Adicionar diretoria
                  </th>
                </tr>
                <tr>
                  <th>
                    Nome da diretoria
                  </th>
                </tr>
                  <td>
                    <input name="nm_diretoria" type="text" placeholder="Insira aqui um nome" id="nome-diretoria" />
                  </td>
                </tr>
                <tr>
                  <th>
                    Cor da diretoria
                  </th>
                </tr>
                <tr>
                  <td>
                    <input name="ds_cor"" type="color" id="color-picker"/>
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

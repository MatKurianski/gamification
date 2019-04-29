<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faça login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/login.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/select.css">
</head>
<body>
    <?php
      include '../class/Sys.php';
      $sys = new Sys;
      if(isset($_GET['cd'])){
        $query = $sys->listarDiretorias($_GET['cd']);
        if(!empty($query)){
          $diretoria = $query->fetch_object();
        }
      }
    ?>
    <div class="container">
      <?php
        if(isset($_GET['cd'])){
          $query = $sys->listarMembrosPorDiretoria($_GET['cd']);
          if(!empty($query)) {
            while($membro = $query->fetch_object()) {
              echo "<div \" class=\"portrait\" onclick=\"window.location.href = '/login_sozinho.php?cd=$membro->cd_membro&diretoria=$diretoria->cd_diretoria'\">";
                echo "<div class=\"foto\">";
                  echo "<img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp2SPzeEh9A9nuLWiTwKRn7P3PY3l6Q70IWaO0a3mykyn106hRzg\" >";
                echo "</div>";
                echo "<div class=\"info\">";
                  echo "<div class=\"cargo\">";
                    echo $membro->nm_cargo;
                  echo "</div>";
                  echo "<div style=\"background-color: $diretoria->ds_cor;\" class=\"nome\">";
                    echo $membro->nm_membro;
                  echo "</div>";
                echo "</div>";
              echo "</div>";
            }
          }
        }
      ?>
    </div>
    <!-- <div class="portrait">
      <div class="foto">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp2SPzeEh9A9nuLWiTwKRn7P3PY3l6Q70IWaO0a3mykyn106hRzg" alt="">
      </div>
      <div class="info">
        <div class="cargo">
          Projetos
        </div>
        <div class="nome">
          Matheus Aquati Kurianski
        </div>
      </div>
    </div> -->

</body>
</html>
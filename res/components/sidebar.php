<?php 
  include_once 'init.php';
?>
<div class="dashboard">
    <div class="profile">
        <img src="https://cdn3.iconfinder.com/data/icons/user-icon-3-1/100/user_3_Artboard_1_copy_2-512.png" />
        <p>
            <?php if(isset($user->nm_membro)){echo $user->nm_membro;}else{echo "Fulano";} ?>
        </p>
    </div>
    <ul id="abas" class="fechado">
        <li id="historico">
            <a class="aba" href="/pages/perfil/historico.php">Histórico</a>
        </li>
        <li id="ranking">
            <a class="aba" href="/pages/ranking.php">Ranking</a>
        </li>
        <li id="regras">
            <a class="aba" href="/pages/admin/cadastrar_regra.php">Regras</a>
        </li>
        <li id="diretorias">
            <a class="aba" href="/pages/admin/cadastrar_diretoria.php">Diretorias</a>
        </li>
        <li id="cargos">
            <a class="aba" href="/pages/admin/cadastrar_cargo.php">Cargos</a>
        </li>
        <li id="membros">
            <a class="aba" href="/pages/admin/membros.php">Membros</a>
        </li>
        <li id="sair">
            <a class="aba" href="/actions/logout.php">Sair</a>
        </li>
    </ul>
    <a onclick=toggleDashboard() id="toggle-sidebar">+</a>
</div>
<script>
  const page_title = document.title.replace("ó", "o").replace("ç", "c").replace("ã", "a").replace("Sintese Game Jr. | ", "").toLowerCase();
  document.getElementById(page_title).classList.add('ativo')

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
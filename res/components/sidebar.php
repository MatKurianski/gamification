<div class="dashboard">
    <div class="profile">
        <img src="https://cdn3.iconfinder.com/data/icons/user-icon-3-1/100/user_3_Artboard_1_copy_2-512.png" />
        <p>
            Fulado de Tal
        </p>
    </div>
    <ul id="abas" class="fechado">
        <li class="ativo">
            <a class="aba">Perfil</a>
        </li>
        <li>
            <a class="aba" href="/pages/perfil/historico.php">Conquistas</a>
        </li>
        <li>
            <a class="aba" href="#">Sair</a>
        </li>
        <li class="ativo">
            <a class="aba">Administração</a>
        </li>
        <li>
            <a class="aba" href="/pages/admin/cadastrar_regra.php">Regras</a>
        </li>
        <li>
            <a class="aba" href="/pages/admin/cadastrar_diretoria.php">Diretorias</a>
        </li>
        <li>
            <a class="aba" href="/pages/admin/cadastrar_cargo.php">Cargos</a>
        </li>
        <li>
            <a class="aba" href="/pages/admin/membros.php">Membros</a>
        </li>
    </ul>
    <a onclick=toggleDashboard() id="toggle-sidebar">+</a>
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
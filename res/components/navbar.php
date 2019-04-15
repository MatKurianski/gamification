<nav class="navbar">
    <div class="logo-area">
        <img class="logo-image" src="/res/img/sintese.png"/>
        <span class="logo-text">Gamification Room</span>
    </div>
    <ul id="navbar-itens" class="navbar-itens">
        <li>
            <a href="#" class="navbar-links">Início</a>
        </li>
        <li>
            <a href="#" class="navbar-links">Hall dos Heróis</a>
        </li>
        <li>
            <a href="#" class="navbar-links">Sair</a>
        </li>
    </ul>
    <a href="#" onclick="toggle()" id="toggle" class="toggle">v</a>
</nav>

<style>
    .navbar {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'PressStart';
        grid-area: navbar;
        flex-wrap: wrap;
        font-size: 16px;
        color: white;
        background-color: rgb(44, 18, 94);
        box-shadow: 10px 5px rgba(0, 0, 0, 0.3);
        padding: 15px 0px;
    }

    .logo-area {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 350px;
        padding: 0px 15px;
    }

    .logo-image {
        width: 30px;
    }

    .navbar-itens {
        width: 100%;
        list-style-type: none;
        display: none;
        padding-bottom: 15px;
    }

    .navbar-itens li {
        padding-bottom: 15px;
        text-align: center;
    }

    .ativa {
        display: block;
    }

    .navbar-links:visited,
    .navbar-links:hover,
    .navbar-links:link {
        text-decoration: none;
        color: white;
    }

    .toggle,
    .toggle:visited,
    .toggle:hover,
    .toggle:link {
        display: block;
        width: 100%;
        text-decoration: none;
        text-align: center;
        color: white;
        margin-bottom: 15px;
    }

    .toggle-invertido {
        transform: rotate(180deg);
    }

    @media screen and (min-width: 992px) {
        .navbar {
            flex-direction: row;
            padding-bottom: 0;
            justify-content: flex-start;
            align-items: center;
        }

        .navbar-itens {
            display: flex;
            margin-left: auto;
            margin-right: 30px;
            width: auto;
            padding: 0;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .navbar-itens li {
            margin-left: 40px;
            padding-bottom: 0;
        }

        .toggle {
            font-size: 0;
        }

        .logo-area {
            justify-self: flex-start;
            margin-left: 35px;
        }
    }
</style>

<script>
    let aberta = false;

    toggle = () => {
        let navbar_itens = document.getElementById("navbar-itens");
        let toggle = document.getElementById("toggle");
        
        aberta = !aberta;
        if(aberta) {
            navbar_itens.classList.add("ativa");
            toggle.classList.add("toggle-invertido");
        } else {
            navbar_itens.classList.remove("ativa");
            toggle.classList.remove("toggle-invertido");
        }
    }
</script>
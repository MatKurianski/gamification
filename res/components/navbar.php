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
        padding: 15px;
        justify-content: center;
        align-items: center;
        font-family: 'PressStart';
        flex-wrap: wrap;
        font-size: 16px;
        color: white;
        background-color: rgb(44, 18, 94);
        box-shadow: 10px 5px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        z-index: 1000;
    }

    .logo-area {
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 350px;
        padding: 0px 15px;
    }

    .logo-image {
        width: 30px;
    }

    .navbar-itens {
        width: 100%;
        font-size: 14px;
        list-style-type: none;
        display: none;
    }

    .navbar-itens li {
        text-align: center;
        padding-bottom: 15px;
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
        width: 100%;
        text-decoration: none;
        text-align: center;
        color: white;
    }

    .toggle-invertido {
        transform: rotate(180deg);
    }

    @media screen and (min-width: 992px) {
        .navbar {
            height: 80px;
            flex-direction: row;
            padding: 0;
            justify-content: flex-start;
            align-items: center;
        }

        .navbar-itens {
            display: flex;
            margin-left: auto;
            margin-right: 30px;
            width: auto;
            height: 100%;
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
            padding: 0;
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
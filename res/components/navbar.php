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
            <a href="#" class="navbar-links">Sobre</a>
        </li>
        <li>
            <a href="#" class="navbar-links">Hall dos Heróis</a>
        </li>
    </ul>
    <a href="#" onclick="toggle()" id="toggle" class="toggle">v</a>
</nav>

<style>
    .navbar {
        font-family: 'PressStart';
        font-size: 16px;
        color: white;
        background-color: rgb(44, 18, 94);
        border: 1px solid black;
        box-shadow: 10px 5px rgba(0, 0, 0, 0.3);
        padding: 15px 0px;
    }

    .logo-area {
        margin-right: auto;
        text-align: center;
        margin-bottom: 10px;
    }

    .logo-image {
        width: 30px;
        vertical-align: middle;
    }

    .navbar-itens {
        list-style-type: none;
        display: none;
        padding-bottom: 15px;
    }

    .navbar-itens li {
        text-align: center;
        margin: 15px auto;
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
        text-decoration: none;
        text-align: center;
        color: white;
        margin-bottom: 15px;
    }

    .toggle-invertido {
        transform: rotate(180deg);
    }

    @media screen and (min-width: 768px) {
        .navbar {
            display: flex;
            justify-content: space-between;
            padding-bottom: 0;
            /* height: 70px; */
            justify-content: flex-end;
            align-items: center;
        }

        .navbar-itens {
            display: flex;
            margin-right: 30px;
            flex-direction: row;
            justify-content: flex-end;
        }

        .navbar-itens li {
            margin: 0;
        }

        .navbar-links {
            margin-left: 40px;
        }

        .toggle {
            font-size: 0;
        }

        .logo-area {
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
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/common.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/login.css">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/pages/select.css">
</head>
<body>
    <?php include '../res/components/navbar.php' ?>
    <br />
    <center>
            <div class="palavras"><p>Login</p></div>
        <div class="portrait">
            <img class="imagem" src="/res/img/heroina.jpg" />
            <div class="nome">
                <p>Matheus Aquati Kurianski</p>
                <img class="pergaminho" src="/res/img/perg.png" />
            </div>
        </div>        
        <form>
            <div class="palavras"><p>Usuário</p></div>
            <input type="email" name="tMail" placeholder="Email" />
            <div class="palavras"><p>Senha</p></div>
            <input type="password" name="tSenha" placeholder="Senha" />
            <p><div class="botao">Jogar!</div></p>
        </form>
    </center>
</body>
</html>
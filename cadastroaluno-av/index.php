<?php
    session_start();
    ob_start();
    require 'config.php';
    require 'head1.php';

    if(isset($_SESSION['id'], $_SESSION['nome'])) {  //Verifica se a session está ativa e se estiver ativa ela redireciona o usuário para a página "home.php"
        header("Location: home.php");
        exit;
    }
?>

<body style="padding: 5rem">  <!-- Página principal para página "login.php" ou "cadastro.php" -->

    <div>
        <h1> Seja bem-vindo! </h1><br/>
    </div>

    <div>
        <a class="btn btn-success" href="login.php"> Login </a><br/><br/>
        <a class="btn btn-primary" href="cadastrar.php"> Criar conta </a>
    </div>

</div>
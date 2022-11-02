<?php
    session_start();
    ob_start();

    require 'head1.php'
    
?>

<!-- Formulário de cadastro de usuário -->
<div class="container" style="margin: 2rem">    
    <h1>Cadastrar Usuário</h1>  
    
    <?php if(isset($_SESSION['msg'])): ?>
            <div class="alert alert-danger" role="alert">
            <?php    
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
            </div>
    <?php endif; ?>
       
   
    <form action="cadastrar_login.php" method="post">
        <div>
            <label for="" class="form-label">
                Nome: <br/>
                <input type="text" name="name">
            </label>
        </div>
        <div>
            <label for="">
                E-mail: <br/>
                <input type="email" name="email">
            </label>
        </div>
        <div>
            <label for="">
                Senha: <br/>
                <input type="password" name="password">
            </label>
        </div>
        <div>
            <label for="" class="form-label">
                Confirmar a Senha: <br/>
                <input type="password" name="password_confirm">
            </label>
        </div>
        
        <input type="submit" value="Enviar"/>
    </form>
</div>
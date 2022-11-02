<?php
    session_start();    //inicia a sessão
    ob_start();   
    require 'config.php';
    require 'head1.php';

    if(isset($_SESSION['nome'])){   //Verifica se uma sessão ja foi iniciada, se sim o usuário é encaminhado para a página "home.php"
        header('Location: home.php');
        exit;
    }

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
   
    if(!empty($dados['SendLogin'])){
    
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindParam(':email', $dados['email'], PDO::PARAM_STR);      
        $sql->execute();

        
        if(($sql) && ($sql->rowCount() != 0)){  //Se $sql e seu rowCount forem diferentes de 0, então será atribuido ao "$resultado" os valores encontrados sem duplicar
            $resultado = $sql->fetch(PDO::FETCH_ASSOC);
            var_dump($resultado);
            if(password_verify($dados['password'], $resultado['senha'])){    //Se a senha do campo "$dados" e a senha que foi atribuida em "$resultado" forem iguais, então a sessão vai ser iniciada
                $_SESSION['id'] = $resultado['id'];
                $_SESSION['nome'] = $resultado['nome'];
                header('Location: home.php');
                exit;
            } else {
                $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";    //Mensagem de erro se forem diferentes
            }
        } else {
            $_SESSION['msg'] = "<p style='color: #ff0000'>Erro: Usuário ou senha inválida!</p>";    //Mensagem de erro se forem iguais a 0
        }

        //Verifica se a mensagem de erro tem algum valor se sim mostra, se não, não mostra
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    }
?>

<!-- Formulario de Login -->
<div class="container" style="margin: 2rem">
    <h1>Login</h1>

    <form action="" method="post">
        <div>
            <label for="">
                Email: <br/>
                <input
                 type="email" 
                 name="email" 
                 class="form-control" 
                 value="<?php if(isset($dados['email'])){ echo $dados['email']; } ?>"
                >
            </label>
        </div>
        <div>
            <label for="">
                Senha: <br/>
                <input type="password" name="password" class="form-control"> <br/>
            </label>
        </div>

        <input type="submit" value="Enviar" name="SendLogin" class="form-control" style="width: 200px"> <br/>
    </form>
    <h5><a type="button" href="cadastrar.php">Cadastar</a></h5>

</div>
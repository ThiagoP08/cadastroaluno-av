<?php
    session_start();
    ob_start();
    require 'config.php';

    //Concede para as variáveis os valores do formulário
    $name = filter_input(INPUT_POST, 'name'); 
    $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL); 
    $password = filter_input(INPUT_POST,'password'); 
    $password_confirm = filter_input(INPUT_POST,'password_confirm'); 


    //Verifica se os valores existem
    if($name && $email && $password && $password_confirm){  
        
        $sql = $pdo->prepare("select * from usuarios where email = :email");    //Seleciona os valores da tabela usuario onde email possui um valor
        $sql->bindValue(':email', $email);
        $sql->execute();

       
        if($sql->rowCount() === 0){
      
            if($password === $password_confirm){    //Verifica se a "Senha" e "Confirmar Senha" são iguais, se forem, as funções são executadas
                
                $password_hash = password_hash($password, PASSWORD_DEFAULT);    //Aplica o hash
                
                $sql = $pdo->prepare( "INSERT INTO usuarios (nome,email,senha) VALUES (:name, :email, :password)" );    //Adiciona os valores na tabla "usuarios"
                $sql->bindValue(':name', $name); 
                $sql->bindValue(':email', $email); 
                $sql->bindValue(':password', $password_hash); 
                $sql->execute();

                
                $_SESSION['msg'] = "Usuário Cadastrado com Sucesso!";
                header("Location: login.php");
                exit;
            } else {
                $_SESSION['msg'] = "Erro: As Senhas não Batem!";
                header('Location: cadastrar.php ');
                exit;
            }
        } else {
            $_SESSION['msg'] = "Erro: E-mail já cadastrado!";
            header('Location: cadastrar.php ');
            exit;
        }
    } else {
        $_SESSION['msg'] = "Erro: Necessário preencher todos os campos!";
        header('Location: cadastrar.php ');
        exit;
    }

    
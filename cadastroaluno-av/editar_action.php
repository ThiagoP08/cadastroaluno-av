<?php
    require 'config.php';

    $id = filter_input(INPUT_POST, 'id');
    $name = filter_input(INPUT_POST, 'name');
    $email = filter_input(INPUT_POST, 'email');  //Filtra todos os novos valores do formulário e concede para as variaveis
    $idade = filter_input(INPUT_POST, 'idade');
    $contato = filter_input(INPUT_POST, 'contato');
    $endereco = filter_input(INPUT_POST, 'endereco');

    if($id && $name && $email && $idade && $contato && $endereco) {  //Verifica se todos os valores existem

        $sql = $pdo->prepare("UPDATE alunos SET nome =:name, email = :email, idade = :idade, contato = :contato, endereco = :endereco WHERE id= :id");
        $sql->bindValue(':id', $id);                    //
        $sql->bindValue(':name', $name);                //
        $sql->bindValue(':email', $email);              //Atualiza o banco de dados
        $sql->bindValue(':idade', $idade);              //
        $sql->bindValue(':contato', $contato);          //
        $sql->bindValue(':endereco', $endereco);        //
        $sql->execute();

        header("Location: home.php");
        exit;

    } else {
        header("Location: editar.php");
        exit;
    }

?>
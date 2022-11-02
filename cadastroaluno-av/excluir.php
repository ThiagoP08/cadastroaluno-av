<?php 

    require 'config.php';

    $id = filter_input(INPUT_GET, 'id');    //Filtra o "id" e atribui à uma variavel

    if ($id) {  //Verifica se o "id" existe
        $sql= $pdo->prepare("DELETE FROM alunos WHERE id = :id");   //Comando para deletar o "id"
        $sql-> bindValue(':id', $id);   //Assimila o valor da variável com o valor que existe no "id"
        $sql->execute ();   //Apaga o "id"
    }
    
    header ('location: home.php'); //Redireciona para a página "home.php"
    exit;
?>
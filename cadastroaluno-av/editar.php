<?php
    require 'config.php';
    require 'head1.php';

    $info = [];  //Cria uma variável que com um array.

    $id = filter_input(INPUT_GET, 'id');  //Filtra os valores de ID no fomulário.

    if($id) {
        $sql = $pdo->prepare("SELECT * FROM alunos WHERE id = :id");  //Seleciona todos os dados da tabela aluno onde o  ID possui um valor definido
        $sql->bindValue(':id', $id);  //Atribui o valor para a variável
        $sql->execute();

        if($sql->rowCount() > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);  //Coloca os valores sem duplicar no array

        } else {
            header("Location: home.php");
            exit;
        }
    } else {
        header("Location: home.php");
        exit;
    }

?>
<!-- Formuláriode edição da tabela alunos -->
<div class="container" style="margin: 2rem">  
    <h1> Editar </h1>

    <form action="editar_action.php" method="post">
        
    <input type="hidden" name="id" value="<?=$info['id']; ?>" />
        
        <div>
            <label for="">
                Nome: <br/>
                <input type="text" name="name" value="<?=$info['nome']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                E-mail: <br/>
                <input type="email" name="email" value="<?=$info['email']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                Idade: <br/>
                <input type="number" name="idade" value="<?=$info['idade']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                Contato: <br/>
                <input type="number" name="contato" value="<?=$info['contato']; ?>">
            </label><br/><br/>
        </div>
        
        <div>
            <label for="">
                Endereço: <br/>
                <input type="text" name="endereco" value="<?=$info['endereco']; ?>">
            </label><br/><br/>
        </div>

        <input type="submit" value="Salvar">
    </form>
</div>
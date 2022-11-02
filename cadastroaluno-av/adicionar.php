<?php
include 'head1.php';
?>
<!-- Formulario para a adição de um aluno -->
<div style="margin: 2rem">
    <h1> Adicionar Aluno </h1>
    
    <form method="post" action="adicionar_action.php">
        <label for="">
            Nome: <br/>
            <input type="text" name="nome">
        </label> <br/>
    
        <label for="">
            E-mail: <br/>
            <input type="email" name="email">
        </label> <br/>
    
        <label for="">
            Idade: <br/>
            <input type="number" name="idade">
        </label> <br/>
        
        <label for="">
            Contato: <br/>
            <input type="number" name="contato">
        </label> <br/>
        
        <label for="">
            Endereço: <br/>
            <input type="text" name="endereco">
        </label> <br/>
        
        <input type="submit" value="Adicionar">
    </form>

</div>
<?php
session_start();
ob_start();
unset($_SESSION['id'], $_SESSION['nome']);  //apaga a sessão

$_SESSION['msg'] = "<p style='color: green'>Deslogado com sucesso!</p>";    //mensagem de confirmação

header("Location: index.php");  //Redireciona para a página "index.php"
exit;
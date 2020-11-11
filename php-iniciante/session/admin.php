<?php
//sempre que formos manipular a sessão precisamos inicia-la.
session_start();

//Olhando todo conteúdo da sessão...
//var_dump($_SESSION);

//Verifica se existe a sessão do usuário logado...
if(!isset($_SESSION['usuario'])) {
    //não existindo redirecionamos o usuário pra tela de login
    return header('Location: /');
}

//O usuário estando logado ele conseguirá ver seu nome e o btn de sair...
print 'Usuário ' . $_SESSION['usuario']['email'] . ' logado';
print '<a href="logout.php">Sair</a>';
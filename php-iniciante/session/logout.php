<?php
//sempre que formos manipular a sessão precisamos inicia-la.
session_start();

//Zerando o array salvo na superglobal da Sessão
$_SESSION = [];

//Destruindo as referências da sessão atual...
session_destroy();

//Redireciona o usuário pra tela de login principal
return header('Location: /');
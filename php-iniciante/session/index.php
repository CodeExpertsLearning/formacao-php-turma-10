<?php
//Verifica se o form de login foi submetido
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    //Senha em código pra facilitar exemplo do login...
    $password = '12345678';

    //Pega os dados enviados do form via post
    /*
        Teremos algo assim: 
        [
            'email' => 'email@digitado.com',
            'password => 'senha-digitada-no-input'
        ]
    */
    $credentials = $_POST; 

    //Pequena verificação se o usuário digitou a senha correta...
    if($credentials['password'] != $password) {
        
        //errando a senha exibimos a mensagem abaixo e matamos a execução do script
        print 'Usuário ou senha incorretos...';
        die;
    }

    //sempre que formos manipular a sessão precisamos inicia-la
    session_start();

    //Usuário acertou suas credenciais nós jogamos os dados dele na sessão
    //Para consumir dentro das views do admin
    $_SESSION['usuario'] = [
        'nome' => 'Teste', 
        'email' => $credentials['email']
    ];

    //usuário autenticado com sucesso nós redirecionamos ele pra admin.php
    return header('Location: admin.php');
}

//Setando valor na sessão...
//$_SESSION['nome'] = 'Nanderson';

//Inclui e Exibe a tela de login/form
require __DIR__ . '/templates/login.phtml';

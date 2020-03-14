<?php
require __DIR__ . '/bootstrap.php';

$url = parse_url($_SERVER['REQUEST_URI'],  PHP_URL_PATH);

if ($url == '/') {
    return header('Location: /admin/usuario');
}

if($url == '/admin/usuario') {

    //Buscar os usuários
    $users = read_db(pdo(), 'users');
    
    require __DIR__ . '/templates/read.phtml';
}

if($url == '/admin/usuario/criar') {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
     
        //Processar a criação do usuário...
        $data = $_POST;
        $data['password'] = password_hash($data['password'], PASSWORD_ARGON2I);
        
        create_db(pdo(), 'users', $data);
        
        return header('Location: /admin/usuario');
    }

    require __DIR__ . '/templates/create.phtml';
} 
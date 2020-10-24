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

if ($url == '/admin/usuario/editar') {


    $id = (int) $_GET['id'];

    $user = read_one_db(pdo(), 'users', $id);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Processar a criação do usuário...
        $data = $_POST;

        if($data['password'])    {
            $data['password'] = password_hash($data['password'], PASSWORD_ARGON2I);
        }else {
            $data['password'] = $user['password'];
        }
        
        $data['id'] = $id;

        update_db(pdo(), 'users', $data);

        return header('Location: /admin/usuario');
    }
    
    require __DIR__ . '/templates/edit.phtml';
}


if($url == '/admin/usuario/remover') {
    
    $id = (int) $_GET['id'];

    delete_db(pdo(), 'users', $id);

    return header('Location: /admin/usuario');
}
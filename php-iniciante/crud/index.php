<?php
require __DIR__ . '/bootstrap.php';

$url = parse_url($_SERVER['REQUEST_URI'],  PHP_URL_PATH);

if ($url == '/') {
    
}

if($url == '/admin/usuario') {
    require __DIR__ . '/templates/read.phtml';
}

if($url == '/admin/usuario/criar') {
  
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Processar a criação do usuário...
        $data = $_POST;
        print 'Criar usuário...';
    }

    require __DIR__ . '/templates/create.phtml';
} 
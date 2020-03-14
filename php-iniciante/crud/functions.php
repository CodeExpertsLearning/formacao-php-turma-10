<?php 

function hello($name = 'Teste')
{
    return 'Hello, ' . $name;
}

/**
 * PHP Data Object
 */
function pdo()
{
   $connector = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
   $conn = new PDO($connector, DB_USER, DB_PASSWORD);

   return $conn;
}

function read_db($conn, $table, $mode = PDO::FETCH_ASSOC)
{
    $users = $conn->query('SELECT * FROM ' . $table);
    return $users->fetchAll($mode);
}


function create_db($conn, $table, $data = [])
{
    $sql = "
        INSERT INTO users(
                name, 
                email, 
                password, 
                created_at, 
                updated_at
                ) 
                VALUES
                (
                    :name,
                    :email,
                    :password,
                    NOW(),
                    NOW()
                ) 
    ";

    $insert = $conn->prepare($sql);
    $insert->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $insert->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $insert->bindValue(':password', $data['password'], PDO::PARAM_STR);

    return $insert->execute();
}
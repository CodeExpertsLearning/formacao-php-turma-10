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
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   return $conn;
}

function read_db($conn, $table, $mode = PDO::FETCH_ASSOC)
{
    return $conn->query('SELECT * FROM ' . $table, $mode);
}

function read_one_db($conn, $table, $id, $mode = PDO::FETCH_ASSOC)
{
    $sql = 'SELECT * FROM users WHERE id = :id';

    $select = $conn->prepare($sql);
    $select->bindValue(':id', $id, PDO::PARAM_INT);
    $select->execute();

    return $select->fetch($mode);
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

    //Prepared Statements
    $insert = $conn->prepare($sql);
    $insert->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $insert->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $insert->bindValue(':password', $data['password'], PDO::PARAM_STR);

    return $insert->execute();
}

function update_db($conn, $table, $data) 
{
    $sql = '
        UPDATE users 
        SET name = :name, email = :email, password = :password
        WHERE id = :id
    ';

    $update = $conn->prepare($sql);
    $update->bindValue(':name', $data['name'], PDO::PARAM_STR);
    $update->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $update->bindValue(':password', $data['password'], PDO::PARAM_STR);

    $update->bindValue(':id', $data['id'], PDO::PARAM_INT);

    return $update->execute();
}

function delete_db($conn, $table, $id)
{
    $sql = 'DELETE FROM users WHERE id = :id';

    $delete = $conn->prepare($sql);

    $delete->bindValue(':id', $id, PDO::PARAM_INT);

    return $delete->execute();
}
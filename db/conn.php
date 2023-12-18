<?php
//This is the connection to database

    $host = '127.0.0.1';
    // $host = 'localhost';
    $db = 'attendance';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    //data source name
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    //This is used to throw & catch an exception
    try{
        $pdo = new PDO($dsn, $user, $pass);
        //  echo "Hello Database"; This line of code check if the DB connection was successful.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new Crud($pdo);
    require_once 'user.php';
    $user = new User($pdo);

    $user->insertUser("admin", "password");

?>




    
    
    

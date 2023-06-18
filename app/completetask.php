<?php

use Classes\DatabaseTable;
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    require __DIR__ . '/includes/global.php';


    $projectsTable =  new DatabaseTable($pdo,'tasks','id');

    if(isset($_POST['task_id'])){

        $task =  $projectsTable->find('task_id', $_POST['task_id']);

        var_dump($task);

        
    }else{
        header('Location: /');
    }



    
    
    } catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
    }
    
    include __DIR__ . '/templates/layout.html.php';
    
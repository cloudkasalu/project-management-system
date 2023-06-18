<?php
use Classes\DatabaseTable;
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    require __DIR__ . '/includes/global.php';

    $projectsTable =  new DatabaseTable($pdo,'projects','id');


    ob_start();
    
    $title = "Homepage";
    $template = 'home.html.php';

    $query = "SELECT DISTINCT * FROM projects";

    $result = $projectsTable->findAll($query);

    foreach ($result as $row) {
        $projects[] = array(
            'project_id' => $row['project_id'], 
            'project_name' => $row['project_name'], 
            'description' => $row['description'],
            'status' => $row['status'],
        );
    }

    include __DIR__ . '/templates/' . $template;

        $output = ob_get_clean();


    
} catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
}

include __DIR__ . '/templates/layout.html.php';

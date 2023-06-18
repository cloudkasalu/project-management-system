<?php
use Classes\DatabaseTable;

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/classes/DatabaseTable.php';
    require __DIR__ . '/includes/global.php';


    $projectsTable =  new DatabaseTable($pdo,'projects','id');
    
    if(isset($_POST['project-name'])){

        $project_name = $_POST['project-name'];
        $project_description = $_POST['project-description'];
        $project_end_date = $_POST['project_end_date'];


        $date = new \DateTime();
        $values= [
            'project_name' => $project_name,
            'description' => $project_description,
            'end_date' => $project_end_date,
            'start_date' => $date->format('Y-m-d H:i:s'),
            'status' => '0%'
        ];

        $projectsTable->insert($values);

        $id = $projectsTable->find('project_name',$project_name)['project_id'];

        header('Location: addmilestone.php?id='. $id .'');


    }else{

        ob_start();
    
        $title = "Add Project";
        $template = 'addProject.html.php';
        include __DIR__ . '/templates/' . $template;
        
        $output = ob_get_clean();

    }
    
    
    } catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
    }
    
    include __DIR__ . '/templates/layout.html.php';
    
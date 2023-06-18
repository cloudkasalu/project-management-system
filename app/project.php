<?php

use Classes\DatabaseTable;
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    require __DIR__ . '/includes/global.php';


    $projectsTable =  new DatabaseTable($pdo,'projects','id');

    if(isset($_GET['project_id'])){

       
        ob_start();

        $project_id = $_GET['project_id'];
    
        $title = "Add Project";
        $template = 'viewProject.html.php';


        $query = "SELECT * FROM projects 
        inner join milestones on projects.project_id = milestones.project_id 
         where projects.project_id =". $_GET['project_id'] ;


        $result = $projectsTable->findAll($query);

        if($result){
            foreach ($result as $row) {
                $projects[] = array(
                    'project_id' => $row['project_id'], 
                    'project_name' => $row['project_name'], 
                    'description' => $row['description'],
                    'status' => $row['status'],
                );
                $milestones[] = array(
                    'milestone_id' => $row['milestone_id'], 
                    'project_id' => $row['project_id'], 
                    'milestone_name' => $row['milestone_name'], 
                );
            }
        }else{
            header('Location: /addmilestone.php?id= ' .$project_id. '');
        }

        if(isset($_GET['milestone_id'])){
            $milestone_id = $_GET['milestone_id'];
        }else{
            $query= "SELECT * FROM milestones WHERE project_id = " . $project_id . " LIMIT 1";
            $result = $projectsTable->findAll($query);    
            $milestone_id = $result[0]['milestone_id'];

        }

        $query = "SELECT * FROM milestones
        inner join tasks on milestones.milestone_id = tasks.milestone_id 
        where milestones.milestone_id =". $milestone_id;

        $result = $projectsTable->findAll($query);
        foreach ($result as $row) {

            $tasks[] = array(
                'project_id' => $row['project_id'], 
                'milestone_id' => $row['milestone_id'], 
                'task_id' => $row['task_id'], 
                'task_name' => $row['task_name'], 
            );
        }

        $project = $projects[0];


        include __DIR__ . '/templates/' . $template;
        
        $output = ob_get_clean();

    }else{
        header('Location: /');

    }




    
    
    } catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
    }
    
    include __DIR__ . '/templates/layout.html.php';
    
<?php

use Classes\DatabaseTable;
require __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    require __DIR__ . '/includes/global.php';


    $tasksTable =  new DatabaseTable($pdo,'tasks','id');
    $projectsTable =  new DatabaseTable($pdo,'projects','id');
    
    if(isset($_POST['task-name'])){

        $task_name = $_POST['task-name'];
        $milestone_id = $_POST['milestone-id'];
        $task_description = $_POST['task-description'];
        $task_due_date = $_POST['task-due-date'];
        $task_assignee = $_POST['assignee'];


        $date = new \DateTime();
        $values= [
            'task_name' => $task_name,
            'milestone_id' => $milestone_id,
            'description' => $task_description,
            'due_date' => $task_due_date,
            'assigned_to' => $task_assignee,
            'status' => '0'
        ];

        $tasksTable->insert($values);

        $joins = [
            [ 
                'table' => 'milestones',
                'field' => 'project_id',
                'value' => 'project_id'
            ]
            ];

        $id = $projectsTable->find('milestone_id',$milestone_id, $joins)['project_id'];
        header('Location: /project.php?id='. $id .'');


    }else if(isset($_GET['id'])){

        ob_start();
    
        $title = "Add Task To task";
        $template = 'addTask.html.php';
        $id = $_GET['id'];
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
    
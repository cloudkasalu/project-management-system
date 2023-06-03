<?php
use Classes\DatabaseTable;

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/classes/DatabaseTable.php';
    require __DIR__ . '/includes/global.php';


    $projectsTable =  new DatabaseTable($pdo,'projects','id');

        $id = $_GET['id'];
        ob_start();
    
        $title = "Add Project";
        $template = 'viewProject.html.php';


        $query1 = "SELECT DISTINCT * FROM projects inner join milestones on projects.project_id = milestones.project_id  where projects.project_id = " . $id;
        $query2 = "SELECT DISTINCT * FROM projects inner join milestones on projects.project_id = milestones.project_id inner join tasks on milestones.milestone_id = tasks.milestone_id where projects.project_id = " . $id;

        $result1 = $projectsTable->findAll($query1);
        $result2 = $projectsTable->findAll($query2);
        foreach ($result1 as $row) {
            $projects[] = array(
                'project_name' => $row['project_name'], 
                'description' => $row['description'],
                'status' => $row['status'],
            );
            $tasks[] = array(
                'task_name' => $row['task_name'], 
            );
        }

        $project = $projects[0];

        include __DIR__ . '/templates/' . $template;
        
        $output = ob_get_clean();


    
    
    } catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
    }
    
    include __DIR__ . '/templates/layout.html.php';
    
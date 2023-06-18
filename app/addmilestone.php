<?php
use Classes\DatabaseTable;

try {

    include __DIR__ . '/includes/DatabaseConnection.php';
    include __DIR__ . '/classes/DatabaseTable.php';
    require __DIR__ . '/includes/global.php';


    $milestonesTable =  new DatabaseTable($pdo,'milestones','id');
    
    if(isset($_POST['milestone-name'])){

        $milestone_name = $_POST['milestone-name'];
        $project_id = $_POST['project-id'];
        $milestone_description = $_POST['milestone-description'];
        $milestone_due_date = $_POST['milestone-due-date'];


        $date = new \DateTime();
        $values= [
            'milestone_name' => $milestone_name,
            'project_id' => $project_id,
            'description' => $milestone_description,
            'due_date' => $milestone_due_date,
            'status' => '0'
        ];

        $milestonesTable->insert($values);

        $id = $milestonesTable->find('milestone_name',$milestone_name)['milestone_id'];

        header('Location: addtask.php?id='. $id .'');


    }else if(isset($_GET['id'])){

        ob_start();
    
        $title = "Add milestone";
        $template = 'addMilestone.html.php';
        $id = $_GET['id'];
        include __DIR__ . '/templates/' . $template;
        
        $output = ob_get_clean();

    }
    
    
    } catch (\PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' .
    $e->getFile() . ':' . $e->getLine();
    }
    
    include __DIR__ . '/templates/layout.html.php';
    
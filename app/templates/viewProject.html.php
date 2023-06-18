
<div class="project-header">
    <div class="project-details">
      <h1 class="project-title"><?=$project['project_name']?></h1>
      <div class="project-dates">Start: 2023-01-01 | End: 2023-12-31</div>
      <div class="progress-bar">
        <div class="progress"></div>
      </div>
    </div>
  </div>
  <section class="section">
      <div class="milestones-section">
          <div class="milestones-header">
            <h2 class="milestones-title">Milestones</h2>
          </div>
          <ul id="milestones-list">
          <?php foreach($milestones as $milestone ): ?>
            <li class="milestone-card">
            <a href="project.php?project_id=<?=$project['project_id']?>&milestone_id=<?=$milestone['milestone_id']?>">
              <div class="milestone-name"><?= $milestone['milestone_name']?></div>
            </a>
            </li>
          <?php endforeach;?>
          </ul>


            <a href="addmilestone.php?id=<?=$project['project_id']?>">
          <button class="add-task-btn">Add Milestone</button>
          </a>

        </div>
        <div class="tasks-section">

          <div class="tasks-header">
            <h1>Tasks</h1>
            <!-- <h3 class="tasks-title">Tasks</h3> -->
          </div>
          <ul id="tasks-list">
          <?php foreach($tasks as $task ): ?>
         
            <li class="task-card">
         
              <form action="completetask.php" method="post" class="task-name">
                  <input type="checkbox" name="checkbox" onChange="this.form.submit()" class="complete-task">
                  <input type="hidden" value="<?=$task['task_id']?>" name="task_id">
                  <p ><?= $task['task_name']?></p>
              </form>

            </li>
            
          <?php endforeach;?>
          </ul>
          <a href="addtask.php?id=<?=$milestone_id?>">
          <button class="add-task-btn">Add Task</button>
          </a>
        </div>
  </section>

  <script src="public/js/script.js"></script>

  
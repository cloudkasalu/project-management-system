
    <h1>Projects</h1>
    <ul id="project-list">
    <?php foreach($projects as $project ): ?>
      <li>
      <a  href="project.php?project_id=<?=$project['project_id']?>">
        <div class="project-card">
          <div class="project-details">
            <div class="project-name"><?= $project['project_name']?></div>
            <div class="project-progress">
              <div class="progress" style="width: <?= $project['status']?>;"></div>
            </div>
          </div>
          <div class="project-due-date">Due: May 31, 2023</div>
        </div>
        </a>
      </li>
      <?php endforeach;?>

    <a  href="addproject.php" >
    <button id="add-project-btn">Add Project</button>
    </a>


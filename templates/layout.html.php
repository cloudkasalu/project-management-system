<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="public/css/styles.css">
  <title><?=$title?></title>
</head>
<body>
  <aside>
    <nav>
      <ul>
        <li><a href="home.php" class="active"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="tasks.php"><i class="fas fa-tasks"></i> Tasks</a></li>
        <li><a href="team.php"><i class="fas fa-users"></i> Team</a></li>
      </ul>
    </nav>
  </aside>
  <main>
    <!-- Main content goes here -->
    <?=$output?>
  </main>
</body>
</html>

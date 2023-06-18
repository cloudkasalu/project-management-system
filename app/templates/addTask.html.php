
<header>
    <h1>Add Task To Milestone</h1>
  </header>

<form id="task-form" method="post" action="">
  <div class="form-group">
    <label for="task-name">Task Name</label>
    <input type="text" id="task-name" name="task-name" required>
  </div>
  <div class="form-group">
    <label for="task-description">Description</label>
    <textarea id="task-description" name="task-description" rows="4" required></textarea>
  </div>
  <div class="form-group">
    <label for="task-due-date">Due Date</label>
    <input type="date" id="task-due-date" name="task-due-date" required>
  </div>
  <div class="form-group">
    <label for="task-assignee">Assignee</label>
    <select id="task-assignee" name="assignee" required>
      <option value="">Select Assignee</option>
      <option value="1">John</option>
      <option value="1">Sarah</option>
      <option value="2">Michael</option>
      <!-- Add more options here -->
    </select>
  </div>
  <input type="hidden" id="milestone-id" name="milestone-id" value="<?=$id?>">
  <button type="submit">Add Task</button>
</form>

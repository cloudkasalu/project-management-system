
  <header>
    <h1>Add Project</h1>
  </header>

  <form id="project-form" method="post" action="">
    <div class="form-group">
      <label for="project-name">Project Name:</label>
      <input type="text" id="project-name" name="project-name" required>
    </div>
    <div class="form-group">
      <label for="project-description">Description:</label>
      <textarea id="project-description" name="project-description" rows="4" required></textarea>
    </div>
    <div class="form-group">
      <label for="project-end-date">End Date:</label>
      <input type="date" id="project-end-date" name="project-end-date" required>
    </div>
    <button type="submit">Add</button>
    <button type="button" id="cancel-project-btn">Cancel</button>
  </form>

  <script src="script.js"></script>


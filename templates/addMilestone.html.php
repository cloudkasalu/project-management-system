    <header>
        <h1>Add Milestone</h1>
    </header>
    <form id="milestone-form" method="post" action="">
        <div class="form-group">
        <label for="milestone-name">Milestone Name</label>
        <input type="text" id="milestone-name" name="milestone-name" required>
        </div>
        <div class="form-group">
        <label for="milestone-description">Description</label>
        <textarea id="milestone-description" name="milestone-description" rows="4" required></textarea>
        </div>
        <div class="form-group">
        <label for="milestone-due-date">End Date</label>
        <input type="date" id="milestone-due-date" name="milestone-due-date" required>
        </div>
        <input type="hidden" id="project-id" name="project-id" value="<?=$id?>">

        <button type="submit">Add Milestone</button>
    </form>
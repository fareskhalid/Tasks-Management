<?php include views_path('layout/header.php') ?>

    <div class="container">
    <section class="header d-flex justify-content-between align-items-center border-bottom">
        <h1 class="text-center mt-2 fw-bold">
            <a href="/task?id=<?= $task['id'] ?>" class="text-dark text-decoration-none d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                     fill="#000000">
                    <path d="M400-80 0-480l400-400 61 61.67L122.67-480 461-141.67 400-80Z"/>
                </svg>
                <span>Taskat</span>
            </a>
        </h1>
        <div>
            <div class="d-inline-block">
                <div class="dropdown">
                    <button class="btn btn-secondary" type="button" id="dropdownMenuButtonLight"
                            data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px"
                             fill="#fff">
                            <path d="M120-240v-66.67h720V-240H120Zm0-206.67v-66.66h720v66.66H120Zm0-206.66V-720h720v66.67H120Z"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <h2 class="text-center mt-3">Edit Task</h2>
        <div class="login m-auto" style="max-width: 600px;">
			<?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
					<?= $error_message ?>
                </div>
			<?php endif ?>
            <form action="/task/edit" method="post" id="editTaskForm">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <div class="mb-3">
                    <label for="title" class="form-label">Task Title</label>
                    <input type="text" name="title" value="<?= $task['title'] ?>" class="form-control" id="title"
                           required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Task Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3"
                              required><?= $task['description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="dueDate" class="form-label">Due Date</label>
                    <input type="date" name="due_date" value="<?= $task['due_date'] ?>" class="form-control"
                           id="dueDate" required>
                </div>
                <div class="mb-3">
                    <label for="status">Task Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="1" <?= $task['status'] == 'pending' ? 'selected' : '' ?> >Pending</option>
                        <option value="2" <?= $task['status'] == 'in_progess' ? 'selected' : '' ?>>In Progress</option>
                        <option value="3" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Save</button>
            </form>
        </div>
    </div>

<?php include views_path('layout/footer.php') ?>
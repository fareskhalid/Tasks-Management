<?php include views_path('layout/header.php') ?>

<div class="container">
    <div class="header d-flex justify-content-between align-items-center border-bottom">
        <h1 class="text-center mt-2 fw-bold">Tasks Management</h1>
        <div>
            <div class="d-inline-block">
                Hi, <span class="text-primary"><?= $user['username'] ?></span>
            </div>
            <a href="/logout" class="btn btn-outline-danger">Logout</a>
        </div>
    </div>

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
                    <input type="text" name="title" value="<?= $task['title'] ?>" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Task Description</label>
                    <textarea name="description" class="form-control" id="description" rows="3" required><?= $task['description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="dueDate" class="form-label">Due Date</label>
                    <input type="date" name="due_date" value="<?= $task['due_date'] ?>" class="form-control" id="dueDate" required>
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
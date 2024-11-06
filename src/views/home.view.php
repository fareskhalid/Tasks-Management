<?php

use TaskManagementSystem\Models\User;
?>

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
        <?php if ($tasks): ?>
            <h2 class="text-center mt-3">Tasks List</h2>
            <div class="tasks">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Task</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Due At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($tasks as $task): ?>
                            <tr>
                                <td scope="row"><?= $task['title'] ?></td>
                                <td><?= $task['description'] ?></td>
                                <td>
                                    <span class="px-3 py-1 rounded-pill bg-<?= taskStatusColor($task['status']) ?>">
                                        <?= taskStatus($task['status']) ?>
                                    </span>
                                </td>
                                <td><?= $task['due_date'] ?></td>
                                <td>
                                    <a href="/task/edit?id=<?= $task['id'] ?>" class="text-decoration-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#0d6efd">
                                            <path d="M160-406.67v-66.66h293.33v66.66H160ZM160-570v-66.67h460V-570H160Zm0-163.33V-800h460v66.67H160ZM520-160v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8.67 9 12.83 20 4.17 11 4.17 22t-4.33 22.5q-4.34 11.5-13.28 20.5L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                                        </svg>
                                    </a>
                                    <a href="/task/delete?id=<?= $task['id'] ?>" class="text-decoration-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="25px" viewBox="0 -960 960 960" width="25px" fill="#f00">
                                            <path d="m366-299.33 114-115.34 114.67 115.34 50-50.67-114-115.33 114-115.34-50-50.66L480-516 366-631.33l-50.67 50.66L430-465.33 315.33-350 366-299.33ZM267.33-120q-27 0-46.83-19.83-19.83-19.84-19.83-46.84V-740H160v-66.67h192V-840h256v33.33h192V-740h-40.67v553.33q0 27-19.83 46.84Q719.67-120 692.67-120H267.33Zm425.34-620H267.33v553.33h425.34V-740Zm-425.34 0v553.33V-740Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center mt-5">
                <h2>No Tasks Today :)</h2>
            </div>
        <?php endif; ?>
    </div>
    <div id="add-task" class="btn btn-primary fs-2" data-bs-toggle="modal" data-bs-target="#addTaskModal">
        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff">
            <path d="M446.67-446.67H200v-66.66h246.67V-760h66.66v246.67H760v66.66H513.33V-200h-66.66v-246.67Z" />
        </svg>
    </div>
    <div class="modal fade" id="addTaskModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/task" method="post" id="addTaskForm">
                        <div class="mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Task Description</label>
                            <textarea name="description" class="form-control" id="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control" id="dueDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="addTaskForm" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </di>
    </div>
</div>

<?php include views_path('layout/footer.php') ?>
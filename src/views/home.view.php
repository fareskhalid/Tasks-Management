<?php include views_path('layout/header.php') ?>

    <div class="container">
        <section class="header d-flex justify-content-between align-items-center border-bottom">
            <h1 class="text-center mt-2 fw-bold">Taskat</h1>
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
        <section>
            <figure class="text-center mt-2 bg-light p-2 rounded">
                <blockquote class="blockquote">
                    <p>Until it's done, Tell none</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    <cite title="Source Title">Unknown</cite>
                </figcaption>
            </figure>
        </section>
        <section class="d-flex justify-content-center bg-purple rounded mt-2 px-3 shadow">
            <form action="" class="w-100 mx-auto">
                <div class="d-flex my-3 mx-auto">
                    <input type="text" name="title" class="form-control me-2" placeholder="Task Title...">
                    <button class="btn btn-primary">Add</button>
                </div>
            </form>
        </section>
        <section class="content">
			<?php if (isset($tasks)): ?>
                <h2 class="tasks-header text-center mt-3">Tasks List</h2>
                <div class="row tasks mx-1 justify-content-center">
					<?php foreach ($tasks as $task): ?>
                        <div class="task d-flex flex-column justify-content-between col-md-3 text-white px-3 py-2 mb-2 me-1 rounded shadow <?= $task['status'] == 'completed' ? 'bg-indigo-900' : 'bg-indigo' ?>"
                             data-task-id="<?= $task['id'] ?>">
                            <h2 class="fw-bold"><?= $task['title'] ?></h2>
                            <p class="text-indigo-light lead"><?= $task['description'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <p class="text-blue-100 fw-bold"><?= $task['due_date'] ?></p>
                                <p class="px-3 py-1 rounded-pill bg-<?= taskStatusColor($task['status']) ?>">
									<?= taskStatus($task['status']) ?>
                                </p>
                            </div>
                        </div>
					<?php endforeach; ?>
                </div>
			<?php else: ?>
                <div class="text-center mt-5">
                    <h2>No Tasks Today :)</h2>
                </div>
			<?php endif; ?>
        </section>
        <div id="add-task" class="btn btn-primary fs-2 shadow" data-bs-toggle="modal" data-bs-target="#addTaskModal">
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#fff">
                <path d="M480-80q-84.33 0-157.33-30.83-73-30.84-127-84.84t-84.84-127Q80-395.67 80-480q0-83.67 30.83-156.67 30.84-73 84.84-127t127-85.16Q395.67-880 480-880q71.67 0 134.33 22.33Q677-835.33 728-796l-48 48.33q-42-31.33-92.33-48.5-50.34-17.16-107.67-17.16-141 0-237.17 96.16Q146.67-621 146.67-480t96.16 237.17Q339-146.67 480-146.67q35.33 0 68.33-6.66Q581.33-160 612-173l50 51q-41 20-86.67 31Q529.67-80 480-80Zm286.67-86.67v-120h-120v-66.66h120v-120h66.66v120h120v66.66h-120v120h-66.66ZM422-297.33 255.33-464.67 304-513.33l118 118L831.33-805l49.34 48.67-458.67 459Z"/>
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
                                <textarea name="description" class="form-control" id="description" rows="3"
                                          required></textarea>
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
            </div>
        </div>
    </div>
<?php include views_path('layout/footer.php') ?>
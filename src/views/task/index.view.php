<?php include views_path('layout/header.php') ?>
    <div class="container">
        <section class="header d-flex justify-content-between align-items-center border-bottom">
            <h1 class="text-center mt-2 fw-bold">
                <a href="/" class="text-dark text-decoration-none d-flex align-items-center">
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
        <section>
            <div class="row mt-2 d-flex justify-content-between align-items-center mb-2">
                <h1 class="col-auto d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="35px" viewBox="0 -960 960 960" width="35px"
                         fill="#a80010">
                        <path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-66.67q139.58 0 236.46-96.87 96.87-96.88 96.87-236.46t-96.87-236.46Q619.58-813.33 480-813.33t-236.46 96.87Q146.67-619.58 146.67-480t96.87 236.46q96.88 96.87 236.46 96.87Zm0-93.33q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170t-170 70Zm0-66.67q72 0 122.67-50.66Q653.33-408 653.33-480t-50.66-122.67Q552-653.33 480-653.33t-122.67 50.66Q306.67-552 306.67-480t50.66 122.67Q408-306.67 480-306.67Zm0-93.33q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Z"/>
                    </svg>
                    <span class="ms-2"><?= $task['title'] ?></span>
                </h1>
                <p class="col-auto d-flex align-items-center my-0 ms-3 fw-bold rounded-pill py-1 px-3 bg-dark text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"
                         fill="#fff">
                        <path d="m622-288.67 48.67-48.66-155.34-156v-195.34h-66.66v222l173.33 178ZM480-80q-82.33 0-155.33-31.5-73-31.5-127.34-85.83Q143-251.67 111.5-324.67T80-480q0-82.33 31.5-155.33 31.5-73 85.83-127.34Q251.67-817 324.67-848.5T480-880q82.33 0 155.33 31.5 73 31.5 127.34 85.83Q817-708.33 848.5-635.33T880-480q0 82.33-31.5 155.33-31.5 73-85.83 127.34Q708.33-143 635.33-111.5T480-80Zm0-400Zm0 333.33q137.67 0 235.5-97.83 97.83-97.83 97.83-235.5 0-137.67-97.83-235.5-97.83-97.83-235.5-97.83-137.67 0-235.5 97.83-97.83 97.83-97.83 235.5 0 137.67 97.83 235.5 97.83 97.83 235.5 97.83Z"/>
                    </svg>
                    <span class="ms-1 lh-md"><?= $task['due_date'] ?></span>
                </p>
            </div>
            <div class="bg-indigo p-3 rounded shadow">
                <p class="lead text-white">
					<?= $task['description'] ?>
                </p>
                <div class="d-flex justify-content-between">
                    <span class="lh-lg px-3 py-1 rounded-pill bg-<?= taskStatusColor($task['status']) ?>">
                        <?= taskStatus($task['status']) ?>
                    </span>
                    <div class="actions bg-white text-dark px-3 py-1 rounded-pill">
                        <a href="/task/edit?id=<?= $task['id'] ?>" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                                 fill="#000">
                                <path d="M160-406.67v-66.66h293.33v66.66H160ZM160-570v-66.67h460V-570H160Zm0-163.33V-800h460v66.67H160ZM520-160v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8.67 9 12.83 20 4.17 11 4.17 22t-4.33 22.5q-4.34 11.5-13.28 20.5L643-160H520Zm300-263-37-37 37 37ZM580-220h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z"/>
                            </svg>
                        </a>
                        <a href="/task/delete?id=<?= $task['id'] ?>" class="text-decoration-none">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px"
                                 fill="#f00">
                                <path d="m366-299.33 114-115.34 114.67 115.34 50-50.67-114-115.33 114-115.34-50-50.66L480-516 366-631.33l-50.67 50.66L430-465.33 315.33-350 366-299.33ZM267.33-120q-27 0-46.83-19.83-19.83-19.84-19.83-46.84V-740H160v-66.67h192V-840h256v33.33h192V-740h-40.67v553.33q0 27-19.83 46.84Q719.67-120 692.67-120H267.33Zm425.34-620H267.33v553.33h425.34V-740Zm-425.34 0v553.33V-740Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include views_path('layout/footer.php') ?>
<?php

namespace TaskManagementSystem\Controllers;

use TaskManagementSystem\Core\Controller;
use TaskManagementSystem\Models\Task;
use TaskManagementSystem\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (! isset($_SESSION['tasks_uid'])) {
            $this->redirect('/login');
        }

        $user = (new User())->getUserById($_SESSION['tasks_uid']);
        $tasks = (new Task())->all();

        view('home', ['user' => $user, 'tasks' => $tasks]);
    }
}

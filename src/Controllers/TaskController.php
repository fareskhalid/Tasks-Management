<?php
    
    namespace TaskManagementSystem\Controllers;
    
    use TaskManagementSystem\Core\Controller;
    use TaskManagementSystem\Core\Validate;
    use TaskManagementSystem\Models\Task;
    use TaskManagementSystem\Models\User;
    
    class TaskController extends Controller
    {
        public function index()
        {
            if (!isset($_SESSION['tasks_uid'])) {
                $this->redirect('/');
            }
            
            // get task data and check if the user is authorized to view it
            $task = new Task();
            $task_id = $_GET['id'];
            $task = $task->belongsToUser($task_id, $_SESSION['tasks_uid']);
            
            if (!empty($task)) {
                view('task/index', ['task' => $task]);
            }
            
            $this->redirect('/');
        }
        
        public function create()
        {
            $error_message = '';
            $valid_task = Validate::str($_POST['title']) && Validate::str($_POST['description']);
            
            if (!$valid_task) {
                $error_message = 'Task information is not valid';
            }
            
            if ($error_message) {
                $this->redirect('/');
            }
            
            $task = [
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'due_date' => $_POST['due_date']
            ];
            
            if ((new Task())->add($task)) {
                $this->redirect('/');
            }
        }
        
        public function edit()
        {
            $task_id = $_GET['id'];
            
            // check if the user not is logged in
            if (!User::authenticated()) {
                $this->redirect('/');
            }
            
            // check if the task belongs to the current user
            $edited_task = (new Task)->find($task_id);
            $user = (new User)->getUserById($_SESSION['tasks_uid']);
            
            if (!$edited_task) {
                $this->redirect('/');
            }
            
            if ($edited_task['user_id'] !== $user['id']) {
                $this->redirect('/');
            }
            
            view('task/edit', ['user' => $user, 'task' => $edited_task]);
        }
        
        public function update()
        {
            $error_message = '';
            $valid_task = Validate::str($_POST['title']) && Validate::str($_POST['description']);
            
            if (!$valid_task) {
                $error_message = 'Task information is not valid';
            }
            
            if ($error_message) {
                $this->redirect('/');
            }
            
            $task_status = match ($_POST['status']) {
                '1' => 'pending',
                '2' => 'in_progress',
                '3' => 'completed',
                default => 'pending',
            };
            
            $task = [
                'id' => $_POST['id'],
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'due_date' => $_POST['due_date'],
                'status' => $task_status,
            ];
            
            if ((new Task())->edit($task)) {
                $this->redirect('/');
            }
        }
        
        public function delete()
        {
            $task_id = $_GET['id'];
            $task = new Task();
            
            // check if the user not is logged in
            if (!User::authenticated()) {
                $this->redirect('/');
            }
            
            // check if the task belongs to the current user
            $deleted_task = $task->find($task_id);
            
            if ($deleted_task['user_id'] === $_SESSION['tasks_uid']) {
                $task->delete($task_id);
            }
            
            $this->redirect('/');
        }
    }
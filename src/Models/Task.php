<?php

namespace TaskManagementSystem\Models;

use TaskManagementSystem\Core\Model;

class Task extends Model
{
    protected $table = "tasks";

    public function add(array $task): bool
    {
        $user_id = $_SESSION["tasks_uid"];

        $q = 'INSERT INTO tasks (user_id, title, description, due_date) VALUES (?, ?, ?, ?)';
        $stmt = $this->db->prepare($q);
        return $stmt->execute([$user_id, $task['title'], $task['description'], $task['due_date']]);
    }

    public function all(): array
    {
        $user_id = $_SESSION["tasks_uid"];

        $q = 'SELECT * FROM tasks WHERE user_id = ?';
        $stmt = $this->db->prepare($q);
        $stmt->execute([$user_id]);

        return $stmt->fetchAll();
    }

    public function find(int $id)
    {
        $q = 'SELECT * FROM tasks WHERE id = :task_id';
        $stmt = $this->db->prepare($q);
        $stmt->bindParam(':task_id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }
	
	public function belongsToUser(int $task_id, int $user_id)
	{
		$q = 'SELECT * FROM tasks WHERE id = :task_id AND user_id = :user_id';
		$stmt = $this->db->prepare($q);
		$stmt->bindParam(':task_id', $task_id);
		$stmt->bindParam(':user_id', $user_id);
		$stmt->execute();
		
		return $stmt->fetch();
	}

    public function edit(array $task): bool
    {
        $q = 'UPDATE tasks SET title = ?, description = ?, due_date = ?, status = ? WHERE id = ?';
        $stmt = $this->db->prepare($q);
        return $stmt->execute([$task['title'], $task['description'], $task['due_date'], $task['status'], $task['id']]);
    }

    public function updateTaskStatuss(array $task): bool
    {
        $q = 'UPDATE tasks SET status = ? WHERE id = ?';
        $stmt = $this->db->prepare($q);
        return $stmt->execute([$task['status'], $task['id']]);
    }

    public function delete(int $id): bool
    {
        $q = 'DELETE FROM tasks WHERE id = :id';
        $stmt = $this->db->prepare($q);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}

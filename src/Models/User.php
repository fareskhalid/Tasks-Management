<?php

namespace TaskManagementSystem\Models;

use TaskManagementSystem\Core\Model;

class User extends Model
{
    protected $table = 'users';

    public function add(array $user): bool
    {
        $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

        $q = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($q);
        return $stmt->execute([$user['username'], $hashed_password, $user['email']]);
    }

    public function authenticate($email, $password): bool
    {
        $q = 'SELECT * FROM users WHERE email = :email';

        $stmt = $this->db->prepare($q);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Store user_id in session
            $_SESSION['tasks_uid'] = $user['id'];
            return true;
        }

        return false;
    }

    public function getUserById(int $id)
    {
        $q = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->db->prepare($q);
        $stmt->execute(['id' =>  $id]);

        return $stmt->fetch();
    }

    public function getUserByEmail(string $email)
    {
        $q = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->db->prepare($q);
        $stmt->execute(['email' =>  $email]);

        return $stmt->fetch();
    }

    public static function authenticated(): bool
    {
        return isset($_SESSION['tasks_uid']);
    }

    public function delete(int $id): bool
    {
        return false;
    }

    public function update($user): bool
    {
        return false;
    }
}

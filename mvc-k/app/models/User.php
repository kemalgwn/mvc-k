<?php
class User
{
    private $db;
    public $id;
    public $username;
    public $email;
    public $password;
    public $is_admin;
    public $warnings;

    public function __construct($id = null)
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=car_db', 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }

        if ($id) {
            $this->loadById($id);
        }
    }

    private function loadById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['password'];
            $this->is_admin = (int)$user['is_admin'];
            $this->warnings = (int)$user['warnings'];
        }
    }

    public function save()
    {
        if ($this->id) {
            $stmt = $this->db->prepare("UPDATE users SET username = ?, email = ?, password = ?, is_admin = ?, warnings = ? WHERE id = ?");
            return $stmt->execute([
                $this->username,
                $this->email,
                $this->password,
                $this->is_admin,
                $this->warnings,
                $this->id
            ]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO users (username, email, password, is_admin, warnings) VALUES (?, ?, ?, ?, ?)");
            $result = $stmt->execute([
                $this->username,
                $this->email,
                $this->password,
                $this->is_admin,
                $this->warnings ?? 0
            ]);
            if ($result) {
                $this->id = $this->db->lastInsertId();
            }
            return $result;
        }
    }

    public function delete()
    {
        if (!$this->id) {
            return false;
        }
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$this->id]);
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findById($id)
    {
        $instance = new self();
        $stmt = $instance->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $userObj = new self();
            $userObj->id = $user['id'];
            $userObj->username = $user['username'];
            $userObj->email = $user['email'];
            $userObj->password = $user['password'];
            $userObj->is_admin = (int)$user['is_admin'];
            $userObj->warnings = (int)$user['warnings'];
            return $userObj;
        }
        return null;
    }

    public static function findAll()
    {
        $instance = new self();
        $stmt = $instance->db->query("SELECT * FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach ($users as $user) {
            $userObj = new self();
            $userObj->id = $user['id'];
            $userObj->username = $user['username'];
            $userObj->email = $user['email'];
            $userObj->password = $user['password'];
            $userObj->is_admin = (int)$user['is_admin'];
            $userObj->warnings = (int)$user['warnings'];
            $result[] = $userObj;
        }
        return $result;
    }

    public static function findByUsername($username)
    {
        $instance = new self();
        $stmt = $instance->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $userObj = new self();
            $userObj->id = $user['id'];
            $userObj->username = $user['username'];
            $userObj->email = $user['email'];
            $userObj->password = $user['password'];
            $userObj->is_admin = (int)$user['is_admin'];
            $userObj->warnings = (int)$user['warnings'];
            return $userObj;
        }
        return null;
    }
}

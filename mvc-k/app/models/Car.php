<?php
class Car {
    private static $db;

    public $id;
    public $name;
    public $price;
    public $image;
    public $specs;
    public $category;
    public $created_by;

    public function __construct() {
    }

    private static function connect() {
        if (!self::$db) {
            self::$db = new PDO('mysql:host=localhost;dbname=car_db', 'root', '');
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$db;
    }

    public static function findAll() {
        $db = self::connect();
        $stmt = $db->query("SELECT * FROM cars");
        return $stmt->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function findById($id) {
        $db = self::connect();
        $stmt = $db->prepare("SELECT * FROM cars WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $car = $stmt->fetch();
        return $car ?: null;
    }

    public function save() {
        $db = self::connect();
        if ($this->id) {
            // Update existing
            $stmt = $db->prepare("UPDATE cars SET name = ?, price = ?, image = ?, specs = ?, category = ?, created_by = ? WHERE id = ?");
            return $stmt->execute([
                $this->name,
                $this->price,
                $this->image,
                $this->specs,
                $this->category,
                $this->created_by,
                $this->id
            ]);
        } else {
            $stmt = $db->prepare("INSERT INTO cars (name, price, image, specs, category, created_by) VALUES (?, ?, ?, ?, ?, ?)");
            $result = $stmt->execute([
                $this->name,
                $this->price,
                $this->image,
                $this->specs,
                $this->category,
                $this->created_by
            ]);
            if ($result) {
                $this->id = $db->lastInsertId();
            }
            return $result;
        }
    }


    public function delete() {
        if (!$this->id) {
            return false;
        }
        $db = self::connect();
        $stmt = $db->prepare("DELETE FROM cars WHERE id = ?");
        return $stmt->execute([$this->id]);
    }


    public function getId() {
        return $this->id;
    }
}

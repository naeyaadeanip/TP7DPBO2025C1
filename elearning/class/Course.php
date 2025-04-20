<?php
class Course {
    private $conn;
    private $table = "courses";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (title, description) VALUES (?, ?)");
        return $stmt->execute([$data['title'], $data['description']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET title = ?, description = ? WHERE id = ?");
        return $stmt->execute([$data['title'], $data['description'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE title LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt;
    }
}
?>

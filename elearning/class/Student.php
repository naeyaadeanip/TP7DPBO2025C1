<?php
class Student {
    private $conn;
    private $table = "students";

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
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email) VALUES (?, ?)");
        return $stmt->execute([$data['name'], $data['email']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$data['name'], $data['email'], $id]);
    }

    public function delete($id) {
        // Hapus data dari enrollments dulu
        $this->conn->prepare("DELETE FROM enrollments WHERE student_id = ?")->execute([$id]);
    
        // Lalu hapus data student-nya
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }    

    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE name LIKE ?");
        $stmt->execute(["%$keyword%"]);
        return $stmt;
    }
}
?>

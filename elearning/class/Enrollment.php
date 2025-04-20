<?php
class Enrollment {
    private $conn;
    private $table = "enrollments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT e.*, s.name AS student_name, c.title AS course_title
          FROM enrollments e
          JOIN students s ON e.student_id = s.id
          JOIN courses c ON e.course_id = c.id
          ORDER BY e.id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (student_id, course_id, enroll_date) VALUES (?, ?, ?)");
        return $stmt->execute([$data['student_id'], $data['course_id'], $data['enroll_date']]);
    }

    public function update($id, $data) {
        $stmt = $this->conn->prepare("UPDATE {$this->table} SET student_id = ?, course_id = ?, enroll_date = ? WHERE id = ?");
        return $stmt->execute([$data['student_id'], $data['course_id'], $data['enroll_date'], $id]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function searchByStudentName($keyword) {
        $query = "SELECT e.*, s.name AS student_name, c.title AS course_title
                  FROM enrollments e
                  JOIN students s ON e.student_id = s.id
                  JOIN courses c ON e.course_id = c.id
                  WHERE s.name LIKE ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(["%$keyword%"]);
        return $stmt;
    }
    
}
?>

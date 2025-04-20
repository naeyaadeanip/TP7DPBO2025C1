<?php
require_once "config/db.php";
require_once "class/Student.php";
require_once "class/Course.php";
require_once "class/Enrollment.php";

$database = new Database();
$db = $database->getConnection();

$studentObj = new Student($db);
$courseObj = new Course($db);
$enrollmentObj = new Enrollment($db);

$action = $_GET['action'] ?? 'list_students';

if ($action == 'list_students') {
    $students = isset($_GET['search']) 
        ? $studentObj->search($_GET['search'])->fetchAll()
        : $studentObj->getAll()->fetchAll();
    include "view/students/list.php";

} elseif ($action == 'add_student') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $studentObj->create($_POST);
        header("Location: index.php?action=list_students");
        exit;
    }
    include "view/students/form.php";

} elseif ($action == 'edit_student') {
    $edit = true;
    $student = $studentObj->getById($_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $studentObj->update($_GET['id'], $_POST);
        header("Location: index.php?action=list_students");
        exit;
    }
    include "view/students/form.php";

} elseif ($action == 'delete_student') {
    $studentObj->delete($_GET['id']);
    header("Location: index.php?action=list_students");
    exit;

/** Courses **/
} elseif ($action == 'list_courses') {
    $courses = isset($_GET['search']) 
        ? $courseObj->search($_GET['search'])->fetchAll()
        : $courseObj->getAll()->fetchAll();
    include "view/courses/list.php";

} elseif ($action == 'add_course') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $courseObj->create($_POST);
        header("Location: index.php?action=list_courses");
        exit;
    }
    include "view/courses/form.php";

} elseif ($action == 'edit_course') {
    $edit = true;
    $course = $courseObj->getById($_GET['id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $courseObj->update($_GET['id'], $_POST);
        header("Location: index.php?action=list_courses");
        exit;
    }
    include "view/courses/form.php";

} elseif ($action == 'delete_course') {
    $courseObj->delete($_GET['id']);
    header("Location: index.php?action=list_courses");
    exit;

/** Enrollments **/
} elseif ($action == 'list_enrollments') {
    $enrollments = isset($_GET['search']) 
        ? $enrollmentObj->searchByStudentName($_GET['search'])->fetchAll()
        : $enrollmentObj->getAll()->fetchAll();
    include "view/enrollments/list.php";

} elseif ($action == 'add_enrollment') {
    $all_students = $studentObj->getAll()->fetchAll();
    $all_courses = $courseObj->getAll()->fetchAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $enrollmentObj->create($_POST);
        header("Location: index.php?action=list_enrollments");
        exit;
    }
    include "view/enrollments/form.php";

} elseif ($action == 'edit_enrollment') {
    $edit = true;
    $enrollment = $enrollmentObj->getById($_GET['id']);
    $all_students = $studentObj->getAll()->fetchAll();
    $all_courses = $courseObj->getAll()->fetchAll();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $enrollmentObj->update($_GET['id'], $_POST);
        header("Location: index.php?action=list_enrollments");
        exit;
    }
    include "view/enrollments/form.php";

} elseif ($action == 'delete_enrollment') {
    $enrollmentObj->delete($_GET['id']);
    header("Location: index.php?action=list_enrollments");
    exit;

} else {
    echo "<h2>404 - Halaman tidak ditemukan</h2>";
}
?>

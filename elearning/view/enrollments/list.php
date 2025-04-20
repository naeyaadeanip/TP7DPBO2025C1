<?php include "view/navbar.php"; ?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Daftar Pendaftaran</h2>
    <a href="index.php?action=add_enrollment" class="btn">+ Tambah Pendaftaran</a>
    <form method="get">
        <input type="text" name="search" placeholder="Cari Pendaftar..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <input type="hidden" name="action" value="list_enrollments">
        <button type="submit">Cari</button>
    </form>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Mahasiswa</th><th>Kursus</th><th>Tanggal Daftar</th><th>Aksi</th></tr>
        <?php foreach ($enrollments as $enroll): ?>
        <tr>
            <td><?= $enroll['id'] ?></td>
            <td><?= htmlspecialchars($enroll['student_name']) ?></td>
            <td><?= htmlspecialchars($enroll['course_title']) ?></td>
            <td><?= htmlspecialchars($enroll['enroll_date']) ?></td>
            <td>
                <a href="index.php?action=edit_student&id=<?= $student['id'] ?>" class="btn">Edit</a>
                <a href="index.php?action=delete_student&id=<?= $student['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>
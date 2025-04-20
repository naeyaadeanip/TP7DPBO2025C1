<?php include "view/navbar.php"; ?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Daftar Kursus</h2>
    <a href="index.php?action=add_course" class="btn">+ Tambah Kursus</a>
    <form method="get">
        <input type="text" name="search" placeholder="Cari judul..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <input type="hidden" name="action" value="list_courses">
        <button type="submit">Cari</button>
    </form>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Judul Kursus</th><th>Deskripsi</th><th>Aksi</th></tr>
        <?php foreach ($courses as $course): ?>
        <tr>
            <td><?= $course['id'] ?></td>
            <td><?= htmlspecialchars($course['title']) ?></td>
            <td><?= htmlspecialchars($course['description']) ?></td>
            <td>
                <a href="index.php?action=edit_course&id=<?= $course['id'] ?>" class="btn">Edit</a>
                <a href="index.php?action=delete_course&id=<?= $course['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
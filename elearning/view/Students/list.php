<?php include "view/navbar.php"; ?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Daftar Mahasiswa</h2>
    <a href="index.php?action=add_student" class="btn">+ Tambah Mahasiswa</a>
    <form method="get">
        <input type="text" name="search" placeholder="Cari nama..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
        <input type="hidden" name="action" value="list_students">
        <button type="submit">Cari</button>
    </form>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= htmlspecialchars($student['name']) ?></td>
            <td><?= htmlspecialchars($student['email']) ?></td>
            <td>
                <a href="index.php?action=edit_student&id=<?= $student['id'] ?>" class="btn">Edit</a>
                <a href="index.php?action=delete_student&id=<?= $student['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
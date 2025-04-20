<link rel="stylesheet" href="style.css">

<div class="container">
    <h2><?= isset($edit) ? 'Edit' : 'Tambah' ?> Mahasiswa</h2>
    <form method="post">
        <label>Nama:</label><br>
        <input type="text" name="name" value="<?= isset($student['name']) ? htmlspecialchars($student['name']) : '' ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= isset($student['email']) ? htmlspecialchars($student['email']) : '' ?>" required><br><br>
        <button type="submit"><?= isset($edit) ? 'Update' : 'Simpan' ?></button>
    </form>
    <a href="index.php?action=list_students">Kembali</a>
</div>
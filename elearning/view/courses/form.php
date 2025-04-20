<link rel="stylesheet" href="style.css">

<div class="container">
    <h2><?= isset($edit) ? 'Edit' : 'Tambah' ?> Kursus</h2>
    <form method="post">
        <label>Judul Kursus:</label><br>
        <input type="text" name="title" value="<?= isset($course['title']) ? htmlspecialchars($course['title']) : '' ?>" required><br>
        <label>Deskripsi:</label><br>
        <textarea name="description" required><?= isset($course['description']) ? htmlspecialchars($course['description']) : '' ?></textarea><br><br>
        <button type="submit"><?= isset($edit) ? 'Update' : 'Simpan' ?></button>
    </form>
    <a href="index.php?action=list_courses">Kembali</a>
</div>
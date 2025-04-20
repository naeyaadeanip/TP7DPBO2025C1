<link rel="stylesheet" href="style.css">

<div class="container">
    <h2><?= isset($edit) ? 'Edit' : 'Tambah' ?> Pendaftaran</h2>
    <form method="post">
        <label>Mahasiswa:</label><br>
        <select name="student_id" required>
            <?php foreach ($all_students as $s): ?>
            <option value="<?= $s['id'] ?>" <?= isset($enrollment['student_id']) && $enrollment['student_id'] == $s['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($s['name']) ?>
            </option>
            <?php endforeach; ?>
        </select><br>
        <label>Kursus:</label><br>
        <select name="course_id" required>
            <?php foreach ($all_courses as $c): ?>
            <option value="<?= $c['id'] ?>" <?= isset($enrollment['course_id']) && $enrollment['course_id'] == $c['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['title']) ?>
            </option>
            <?php endforeach; ?>
        </select><br>
        <label>Tanggal Daftar:</label><br>
        <input type="date" name="enroll_date" value="<?= isset($enrollment['enroll_date']) ? $enrollment['enroll_date'] : '' ?>" required><br><br>
        <button type="submit"><?= isset($edit) ? 'Update' : 'Simpan' ?></button>
    </form>
    <a href="index.php?action=list_enrollments">Kembali</a>
</div>
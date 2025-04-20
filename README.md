# TP7DPBO2025C1

# Janji
Saya Naeya Adeani Putri dengan NIM 2304017 mengerjakan Tugas Praktikum Latihan 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain Program
![Screenshot 2025-04-19 191300](https://github.com/user-attachments/assets/ac9c62f6-7027-4626-aaf0-261b3c736364)

### `Database.php`
- Bertanggung jawab atas koneksi ke basis data menggunakan PDO
- Menggunakan prepared statements untuk mencegah SQL Injection
- Digunakan oleh semua modul (students, courses, enrollments)

### `Students`
Mengelola data siswa (students):
- Menyimpan nama dan email siswa
- Mendukung tambah, edit, hapus, dan cari berdasarkan nama
- CRUD di-handle melalui file:
  - `class/students.php` (lihat & cari)
  - `view/students/form.php`
  - `view/students/list.php`

### `Courses`
Mengelola data mata kuliah (courses):
- Menyimpan judul dan deskripsi kursus
- Mendukung semua operasi CRUD
- File terkait:
  - `class/courses.php`
  - `view/courses/form.php`
  - `view/courses/list.php`

### `Enrollments`
Mengelola pendaftaran siswa ke kursus:
- Menghubungkan siswa (`students.id`) dengan kursus (`courses.id`)
- Menyimpan tanggal pendaftaran
- File CRUD:
  - `class/enrollments.php`
  - `view/enrollments/list.php` (dropdown siswa dan kursus)
  - `view/enrollments/form.php`

---
### Struktur Database

### Tabel `students`
- `id` (Primary Key)
- `name`
- `email`

### Tabel `courses`
- `id` (Primary Key)
- `title`
- `description`

### Tabel `enrollments`
- `id` (Primary Key)
- `student_id` (Foreign Key → students.id)
- `course_id` (Foreign Key → courses.id)
- `enroll_date`

Relasi:
- Satu siswa bisa mengikuti banyak kursus
- Satu kursus bisa diikuti banyak siswa
- Relasi many-to-many di-handle oleh tabel `enrollments`

# Alur Program

### Inisialisasi
- Aplikasi dimulai dari `index.php`
- File `config/database.php` melakukan koneksi database
- Header dan footer dimuat sebagai layout utama

### Navigasi dan Routing
- Parameter `?page=` digunakan untuk menentukan modul:
  - `?page=students`
  - `?page=courses`
  - `?page=enrollments`
- Parameter tambahan (`?action=edit&id=...`, dll.) mengatur aksi

### Operasi CRUD
- **Tambah**: form POST → query insert (dengan PDO)
- **Lihat**: data ditampilkan dalam tabel
- **Ubah**: data lama ditampilkan di form → disimpan kembali
- **Hapus**: data dihapus dengan konfirmasi

### Fungsi Pencarian
- Halaman `students/index.php` memiliki form pencarian
- Input kata kunci dikirim melalui GET
- Hasil query difilter berdasarkan `name LIKE %keyword%`

---

### Alur Antarmuka Pengguna

- Halaman utama: `index.php` → link ke setiap modul
- Setiap modul memiliki:
  - Form pencarian (khusus `students`)
  - Tabel data
  - Form tambah/edit
  - Tombol aksi (edit, delete)
  - Feedback pesan sukses atau error

# Dokumentasi


https://github.com/user-attachments/assets/33ef7d32-8b8c-498c-b326-9de8abd84652


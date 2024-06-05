a# UTS PSAIT - Aplikasi Manajemen Nilai Mahasiswa

Aplikasi ini merupakan bagian dari tugas UTS PSAIT yang bertujuan untuk mengelola nilai mahasiswa menggunakan teknologi Laravel sebagai backend dan Vue.js sebagai frontend.

## Fitur Utama

Aplikasi ini memiliki beberapa fitur utama, antara lain:

- Menampilkan daftar nilai mahasiswa.
- Memasukkan nilai baru untuk mahasiswa tertentu.
- Mengupdate nilai mahasiswa.
- Menghapus nilai mahasiswa.

## Teknologi yang Digunakan

### Backend (Laravel)

- Laravel Framework: digunakan untuk membuat REST API yang mengelola data nilai mahasiswa.
- SQLite Database: digunakan sebagai database untuk menyimpan data mahasiswa, mata kuliah, dan nilai perkuliahan.
- Eloquent ORM: digunakan untuk mengakses dan mengelola data pada database.

### Frontend (Vue.js)

- Vue.js: digunakan untuk membuat antarmuka pengguna yang responsif dan interaktif.
- Axios: digunakan untuk melakukan HTTP request ke backend API.
- CSS (Cascading Style Sheets): digunakan untuk mengatur tampilan dan layout komponen-komponen frontend.

## Instalasi dan Penggunaan

### Backend (Laravel)

1. Pastikan PHP dan Composer sudah terinstal di komputer Anda.
2. Clone repository backend dari GitHub:

   ```bash
   git clone https://github.com/nama-user/repository-backend.git
   ```

3. Masuk ke direktori backend:

   ```bash
   cd repository-backend
   ```

4. Install dependencies:

   ```bash
   composer install
   ```

5. Salin file `.env.example` menjadi `.env` dan sesuaikan pengaturan database.

6. Generate key aplikasi:

   ```bash
   php artisan key:generate
   ```

7. Jalankan migrasi untuk membuat schema database:

   ```bash
   php artisan migrate
   ```

8. Jalankan server backend:

   ```bash
   php artisan serve
   ```

### Frontend (Vue.js)

1. Clone repository frontend dari GitHub:

   ```bash
   git clone https://github.com/wildandr/UTS_PSIT/
   ```

2. Masuk ke direktori frontend:

   ```bash
   cd repository-frontend
   ```

3. Install dependencies:

   ```bash
   npm install
   ```

4. Atur URL backend API pada file `src/components/NilaiMahasiswa.vue`.

5. Jalankan aplikasi frontend:

   ```bash
   npm run serve
   ```

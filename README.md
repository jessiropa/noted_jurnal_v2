# 📝 Noted Jurnal

**Noted Jurnal** adalah sebuah sistem task management yang dirancang khusus untuk membantu pengerjaan skripsi. Website ini bertujuan untuk menyelesaikan permasalahan dalam mengelola referensi pustaka dan memantau progres pengerjaan tugas secara efisien.

Proyek ini terinspirasi dari pengalaman teman saya yang sering kehilangan link referensi penting serta kesulitan melacak progres tugas yang telah dikerjakan. Dengan **Noted Jurnal**, pengguna dapat dengan mudah mengorganisir referensi pustaka, memantau tugas, dan mengelola proyek dengan lebih terstruktur.

---

## **Fitur Utama**

- **Dashboard/Home**  
  Halaman awal setelah login yang menampilkan informasi jumlah proyek dan tugas yang sedang dikerjakan.
  ![Home](assets.images/github/1.home.png)
- **Task Management**  
  Halaman untuk melihat, menambahkan, dan mengelola daftar tugas yang sedang dikerjakan.
  ![Task](assets.images/github/2.task.png)
- **Project Management**  
  Halaman untuk mengelola proyek yang telah dibuat, termasuk detail tentang tugas-tugas dalam setiap proyek.
  ![Project](assets.images/github/3.project.png)
- **Link Referensi**  
  Halaman khusus untuk menyimpan link referensi pustaka, yang dikelompokkan berdasarkan kategori.
  ![Link](assets.images/github/4.link.png)
- **Settings**  
  Halaman untuk mengelola informasi akun, seperti nama, username, dan password.
  ![Setting](assets.images/github/5.setting.png)

---

## **Teknologi yang Digunakan**

- **Framework**: [CodeIgniter 3.1.13](https://codeigniter.com/)
- **Server Lokal**: XAMPP v3.2.1
- **Frontend**: jQuery, JavaScript, [Bootstrapdash - Corona Dark Template](https://www.bootstrapdash.com/)
- **Database**: MySQL (melalui XAMPP)

## **Cara Instalasi**

Ikuti langkah-langkah di bawah untuk menjalankan proyek ini secara lokal:

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/noted-jurnal.git
   ```
2. **Setup Server Lokal**

- Pastikan XAMPP terinstal di komputer Anda.
- Salin folder proyek ke direktori htdocs di XAMPP.

3. **Konfigurasi Database**

- Buat database baru di phpMyAdmin.
- Import file SQL yang ada di folder database pada proyek ini.
- Sesuaikan konfigurasi database di file application/config/database.php:

  ```bash
  'hostname' => 'localhost',
  'username' => 'root',
  'password' => '',
  'database' => 'nama_database',
  ```

4. **Menjalankan Aplikasi**

- Buka browser dan akses:
  ```bash
  http://localhost/noted-jurnal
  ```

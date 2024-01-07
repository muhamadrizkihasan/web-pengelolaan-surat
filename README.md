<h2>Website Pengelolaan Surat</h2>

Website tugas sekolah untuk uji kelayakan PKL 

<h2 id="fitur">🧐 Fitur apa saja yang ada di website pengelolaan surat ini?</h2>

-   [Dashboard Admin LTE](https://adminlte.io/)
    -   Dashboard UI
-   Landing Page
    -   Halaman Login
    -   Dashboard
    -   Data Staff Tata Usaha
    -   Data Guru
    -   Data Klasifikasi Surat
    -   Data Surat
-   Authentication
    -   Login
    -   Logout
-   Multi User
    -   Staff TU
        -   Mengelola user (Staff TU dan Guru (CRUD))
        -   Mengelola data klasifikasi surat (CRUD)
        -   Mengelola data surat (CRUD)
    -   Guru
        -   Membuat data hasil rapat
-   Cari Data
-   Export PDF
-   Export Excel


<h2 id="installation">💻 Instalasi</h2>

1. Clone repository

```bash
git clone https://github.com/muhamadrizkihasan/web-pengelolaan-surat.git
cd web-pengelolaan-surat
composer install
cp .env.example .env
```

2. Konfigurasi database melalui file `.env`

```conf
DB_DATABASE=db_pengelolaan_surat
```

3. Migrasi and symlink

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate
php artisan db:seed
```

4. Jalankan website

```bash
php artisan serve
```

<h2 id="testing-account">👤 Akun default untuk testing</h2>

### 🧖 Staff Tata Usaha

-   Email : rizki@gmail.com
-   Password : staff

### 👨‍🏫Guru

-   Email : hasan@gmail.com
-   Password : guru
<h2>Website Pengelolaan Surat</h2>

Website tugas sekolah untuk uji kelayakan PKL 

<h2 id="fitur">🤨 What features are available in Confess?</h2>

-   [Dashboard Admin LTE](https://adminlte.io/)
    -   Dashboard UI
-   Landing Page
    -   Dashboard
    -   Data Staff Tata Usaha
    -   Data Guru
    -   Data Klasifikasi Surat
    -   Data Surat
-   Authentication
    -   Login
-   Multi User
    -   Staff TU
        -   Mengelola user (Staff TU dan Guru)
        -   Mengelola data klasifikasi surat (CRUD)
        -   Mengelola data surat (CRUD)
    -   Officer
        -   Membuat data hasil rapat
-   Cari Data
-   Export PDF
-   Export Excel


<h2 id="installation">💻 Installation</h2>

1. Clone repository

```bash
git clone https://github.com/muhamadrizkihasan/web-pengelolaan-surat.git
cd web-pengelolaan-surat
composer install
cp .env.example .env
```

2. Database configuration through the `.env` file

```conf
APP_DEBUG=true
DB_DATABASE=db_pengelolaan_surat
```

3. Migration and symlink

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

4. Launch the website

```bash
php artisan serve
```

<h2 id="testing-account">👤 Default account for testing</h2>

### 🧖 Staff Tata Usaha

-   Email : rizki@gmail.com
-   Password : staff

### 👨‍🏫Officer

-   Email : hasan@gmail.com
-   Password : guru
<h2>Website Pengelolaan Surat</h2>

Website tugas sekolah untuk uji kelayakan PKL 

<h2 id="fitur">🤨 What features are available in Confess?</h2>

-   [Mazer Bootstrap Template](https://github.com/zuramai/mazer)
    -   Dark and light mode
    -   Dashboard UI
-   Landing Page
    -   Homepage
    -   About
    -   Confession
    -   Comment
    -   Confession's category
-   Authentication
    -   Registration
    -   Login
-   Multi User
    -   Admin
        -   History login, confession, response, and comment statistics (full overview)
        -   Manageable users
        -   Manageable confession's categories
        -   Manageable website informations
        -   Deactivate their own account
    -   Officer
        -   History login, confession, response, and comment statistics (half overview)
        -   Handling student's confessions
    -   Student
        -   History login, confession, response, and comment statistics (shallow overview)
        -   Submit confessions
    -   All
        -   Comment to a confession on Landing Page
        -   Account
        -   Export data
-   Account
    -   Profile
    -   Setting
    -   Change Password
-   Searchable Landing Page
    -   Confessions
    -   Confession's categories


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
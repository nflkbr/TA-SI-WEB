# WEEK4 - Laravel Authentication Project

Project WEEK4 merupakan implementasi sistem authentication sederhana menggunakan framework Laravel 12 dengan konsep MVC (Model View Controller).  
Aplikasi ini dibuat sebagai latihan praktikum SI Web yang mencakup proses login, session management, routing Laravel, Blade Template, serta integrasi database SQLite.

Project juga mengadaptasi konsep sistem login dan pengelolaan session dari implementasi sebelumnya pada project Premium Car Catalog berbasis PHP Native.

---

# 📌 Project Overview

Aplikasi ini dirancang untuk memahami dasar pengembangan web modern menggunakan Laravel, meliputi:

- Authentication sederhana
- Session management
- Routing Laravel
- Blade templating
- MVC Architecture
- Database migration
- SQLite integration
- Frontend asset management menggunakan Vite & TailwindCSS

---

# 🚀 Tech Stack

- PHP 8.2
- Laravel 12
- SQLite
- Blade Template Engine
- Tailwind CSS
- Vite
- Axios
- JavaScript

---

# 📂 Struktur Folder

```bash
WEEK4
├── app
│   ├── Http
│   │   └── Controllers
│   │       ├── AuthController.php
│   │       └── Controller.php
│   │
│   ├── Models
│   │   └── User.php
│   │
│   └── Providers
│       └── AppServiceProvider.php
│
├── bootstrap
├── config
│
├── database
│   ├── factories
│   │   └── UserFactory.php
│   │
│   ├── migrations
│   │   ├── 0001_01_01_000000_create_users_table.php
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   └── 0001_01_01_000002_create_jobs_table.php
│   │
│   ├── seeders
│   │   └── DatabaseSeeder.php
│   │
│   └── database.sqlite
│
├── public
│
├── resources
│   ├── css
│   │   └── app.css
│   │
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   │
│   └── views
│       ├── index.blade.php
│       ├── login.blade.php
│       └── welcome.blade.php
│
├── routes
│   ├── console.php
│   └── web.php
│
├── storage
├── tests
├── vendor
└── .gitignore
```

---

# ✨ Fitur Utama

## 🔐 Authentication System

Sistem authentication dibangun menggunakan Laravel Controller dan Session Authentication.

Fitur login berfungsi untuk:
- Memvalidasi user
- Menyimpan session login
- Membatasi akses halaman tertentu
- Redirect otomatis setelah login/logout

---

## 🧩 MVC Architecture

Project menggunakan arsitektur MVC Laravel:

### Model
Digunakan untuk mengelola data user.

```bash
app/Models/User.php
```

### View
Menggunakan Blade Template Laravel.

```bash
resources/views/
```

### Controller
Mengatur logic authentication dan request handling.

```bash
app/Http/Controllers/AuthController.php
```

---

## 🗄️ Database Migration

Laravel migration digunakan untuk membuat struktur database secara otomatis.

File migration:

```bash
database/migrations/
```

Migration utama:
- users table
- cache table
- jobs table

---

## 🎨 Frontend Styling

Frontend menggunakan:
- Tailwind CSS
- Vite
- Blade Template

Asset frontend berada pada:

```bash
resources/css/
resources/js/
```

---

# 📖 Penjelasan Program

---

# 1️⃣ Penjelasan index.blade.php

Halaman `index.blade.php` berfungsi sebagai halaman utama aplikasi setelah user berhasil melakukan login ke dalam sistem. File ini menggunakan Blade Template Laravel sebagai template engine untuk menampilkan tampilan antarmuka aplikasi secara dinamis.

Pada bagian awal halaman, sistem melakukan pengecekan session authentication untuk memastikan hanya user yang sudah login yang dapat mengakses halaman utama. Jika session user tidak ditemukan maka Laravel akan melakukan redirect menuju halaman login.

Struktur halaman terdiri dari beberapa bagian utama yaitu:

- Navbar
- Main Content
- Informasi User
- Tombol Logout

Navbar digunakan sebagai navigasi utama aplikasi dan dibuat responsif menggunakan utility class Tailwind CSS sehingga dapat menyesuaikan berbagai ukuran layar.

Bagian konten utama digunakan untuk menampilkan dashboard aplikasi serta informasi user yang sedang login. Blade Template memungkinkan data dari controller dikirim langsung ke halaman view secara dinamis menggunakan syntax Blade Laravel.

Secara keseluruhan file ini berfungsi sebagai pusat tampilan utama aplikasi setelah proses authentication berhasil dilakukan.

---

# 2️⃣ Penjelasan app.css

File `app.css` digunakan untuk mengatur tampilan antarmuka aplikasi secara keseluruhan.

Styling aplikasi menggunakan Tailwind CSS yang terintegrasi dengan Vite Laravel sehingga proses pengembangan frontend menjadi lebih cepat dan modular.

Pada file ini dilakukan pengaturan:

- Typography
- Layout
- Responsive Design
- Warna
- Spacing
- Styling component

Pendekatan utility-first dari Tailwind CSS mempermudah pengelolaan desain karena styling dapat diterapkan langsung pada elemen HTML tanpa perlu membuat class CSS tambahan secara berlebihan.

Selain itu penggunaan Vite memungkinkan proses hot reload sehingga perubahan tampilan dapat langsung terlihat tanpa reload manual browser.

---

# 3️⃣ Penjelasan app.js

File `app.js` digunakan untuk mengelola JavaScript utama aplikasi Laravel.

JavaScript pada project ini digunakan untuk:
- Inisialisasi frontend
- Import dependency JavaScript
- Menghubungkan Vite dengan Laravel
- Menjalankan interaksi frontend

File ini bekerja bersama:

```bash
resources/js/bootstrap.js
```

Penggunaan Vite memungkinkan proses bundling JavaScript menjadi lebih cepat dan efisien sehingga performa frontend aplikasi menjadi lebih optimal.

---

# 4️⃣ Penjelasan login.blade.php

File `login.blade.php` berfungsi sebagai halaman authentication user sebelum masuk ke sistem.

Halaman login dibuat menggunakan:
- Blade Template
- Form HTML
- Tailwind CSS

Form login memiliki beberapa komponen utama:

## 🔹 Username / Email Input

Digunakan untuk menerima data username atau email dari user.

---

## 🔹 Password Input

Digunakan untuk menerima password user secara aman menggunakan input type password.

---

## 🔹 Login Button

Tombol login digunakan untuk mengirim data form ke controller authentication Laravel.

---

## 🔹 Validation

Laravel melakukan validasi input untuk memastikan data login sesuai dengan aturan sistem.

Secara keseluruhan halaman login berfungsi sebagai gerbang autentikasi sebelum user dapat mengakses halaman utama aplikasi.

---

# 5️⃣ Penjelasan AuthController.php

File `AuthController.php` berfungsi sebagai pusat logika authentication aplikasi.

Controller ini menangani:
- Login process
- Logout process
- Session handling
- Redirect halaman

---

## 🔹 Login Process

Saat user mengirim form login:
- Request diterima controller
- Data divalidasi
- Sistem memeriksa user
- Session login dibuat

Jika berhasil:
- User diarahkan ke halaman utama

Jika gagal:
- User dikembalikan ke halaman login

---

## 🔹 Session Management

Laravel menggunakan session untuk menyimpan status login user.

Session digunakan agar user tetap login selama aplikasi digunakan.

---

## 🔹 Logout Process

Saat logout:
- Session user dihapus
- Authentication dihentikan
- User diarahkan kembali ke halaman login

Secara keseluruhan controller ini menjadi pusat pengelolaan authentication dan keamanan akses aplikasi.

---

# 6️⃣ Penjelasan web.php

File `routes/web.php` digunakan untuk mendefinisikan routing utama aplikasi Laravel.

Routing digunakan untuk:
- Menampilkan halaman login
- Menampilkan halaman utama
- Menjalankan proses authentication
- Logout user

Laravel akan menghubungkan route dengan controller atau view tertentu sehingga proses request dan response aplikasi dapat berjalan secara terstruktur.

---

# ⚙️ Instalasi Project

## 1. Clone Repository

```bash
git clone <repository-url>
cd WEEK4
```

---

## 2. Install Dependency PHP

```bash
composer install
```

Digunakan untuk menginstall seluruh dependency Laravel dari file:

```bash
composer.json
```

---

## 3. Install Dependency Frontend

```bash
npm install
```

Digunakan untuk menginstall dependency frontend seperti:
- Vite
- Tailwind CSS
- Axios

---

## 4. Copy File Environment

```bash
cp .env.example .env
```

Digunakan untuk membuat file konfigurasi Laravel.

---

## 5. Generate Application Key

```bash
php artisan key:generate
```

Digunakan untuk membuat APP_KEY Laravel.

---

## 6. Jalankan Migration

```bash
php artisan migrate
```

Digunakan untuk membuat struktur database otomatis.

---

## 7. Jalankan Laravel Server

```bash
php artisan serve
```

Menjalankan local development server Laravel.

---

## 8. Jalankan Vite

```bash
npm run dev
```

Menjalankan frontend development server.

---

# 🗄️ Database Configuration

Project menggunakan SQLite sebagai database utama.

Lokasi database:

```bash
database/database.sqlite
```

Konfigurasi `.env`:

```env
DB_CONNECTION=sqlite
```

---

# 📦 Laravel Development Mode

Laravel menyediakan script development otomatis melalui composer:

```bash
composer run dev
```

Command tersebut menjalankan:

- Laravel Server
- Queue Listener
- Laravel Pail
- Vite Development Server

Secara bersamaan menggunakan package concurrently.

---

# 🧪 Testing

Menjalankan testing Laravel:

```bash
php artisan test
```

---

# 📚 Konsep yang Dipelajari

Project ini mempelajari beberapa konsep utama web development:

- Authentication
- Session Management
- MVC Architecture
- Laravel Routing
- Database Migration
- Blade Templating
- Frontend Asset Management
- SQLite Integration
- Laravel CLI
- Composer & NPM Dependency Management

---

# 🔗 Repository

GitHub Repository:

```bash
https://github.com/nflkbr/ISB-310-Praktikum-SI-WEb.git
```

---

# 👨‍💻 Developer

**Naufal Akbar Fachrizal**  
Praktikum SI Web - Week 4 Project

---

# 📄 License

Project ini menggunakan lisensi MIT.
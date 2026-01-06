# Capstone Project - Salsabila (Food Ordering System)

## Deskripsi
Aplikasi ini adalah sistem pemesanan makanan berbasis web yang dibangun menggunakan framework **Laravel**. Proyek ini ditujukan untuk mempermudah pengelolaan menu, pesanan, dan laporan penjualan bagi restoran atau kafe.

## Fitur Utama

### Admin
- **Dashboard**: Melihat ringkasan penjualan dan status terkini.
- **Manajemen Menu**: Menambah, mengedit, dan menghapus item menu (Makanan, Minuman, Snack).
- **Manajemen Pesanan**: Melihat daftar pesanan masuk dan memperbarui status pesanan.
- **Laporan**: Mengunduh laporan penjualan dalam format PDF.

### Pelanggan (User)
- **Lihat Menu**: Menjelajahi daftar menu berdasarkan kategori (Makanan, Minuman, Snack).
- **Keranjang Belanja**: Menambahkan item ke keranjang sebelum checkout.
- **Checkout**: Melakukan pemesanan.

## Teknologi yang Digunakan
- **Backend**: Laravel Framework 12.x (PHP ^8.2)
- **Frontend**: Blade Templates, Tailwind CSS, Flowbite
- **Database**: MySQL
- **Dependencies Utama**: 
  - `barryvdh/laravel-dompdf` (untuk generate PDF)
  - `tailwindcss` & `flowbite` (untuk styling)

## Cara Instalasi dan Menjalankan Project

1. **Clone Repository**
   ```bash
   git clone https://github.com/Davaihza/Capstone-Project-Salsabila.git
   cd Capstone-Project-Salsabila
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   - Salin file `.env.example` menjadi `.env`
     ```bash
     cp .env.example .env
     ```
   - Atur konfigurasi database di file `.env` (DB_DATABASE, DB_USERNAME, dll).

4. **Generate Key & Migrasi Database**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

5. **Jalankan Aplikasi**
   - Menjalankan server development:
     ```bash
     php artisan serve
     ```
   - Compile aset frontend (jika perlu):
     ```bash
     npm run dev
     ```

## Route List
- **User**:
  - `/` & `/menu`: Halaman menu utama
  - `/checkout`: Halaman checkout
- **Admin** (`/admin`):
  - `/`: Dashboard Admin
  - `/menu`: Manajemen Menu
  - `/orders`: Manajemen Pesanan
  - `/report/download`: Download Laporan

## Struktur Folder
- `app/Http/Controllers`: Logika aplikasi (AdminController, CheckoutController, OrderController).
- `database/migrations`: Struktur tabel database.
- `resources/views`: Tampilan antarmuka (Blade templates).
- `routes/web.php`: Definisi rute aplikasi.

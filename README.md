# Warung Salsabila - Digital Ordering System 🍲

**Capstone Project Application**
Sistem pemesanan makanan digital untuk UMKM Warung Salsabila yang terintegrasi dengan Google Sheets sebagai log transaksi dan Supabase sebagai database cloud.

[**🌐 LIHAT WEBSITE LIVE DI SINI**](https://umkm-salsabila.onrender.com)

---

## 🔥 Fitur Utama
1.  **User Ordering (Tanpa Login):** Pelanggan bisa scan QR / buka link, pilih menu, dan pesan langsung tanpa harus mendaftar. (Ala Self-Service Gacoan).
2.  **Admin Dashboard (Secure):** Halaman khusus admin untuk mengatur menu, melihat pesanan masuk, dan update status pesanan.
3.  **Real-time Status Sync:** Update status di Admin (Pending -> Processing -> Completed) otomatis tersinkronisasi ke Google Sheets.
4.  **Cloud Storage:** Gambar produk tersimpan aman di Cloudinary (tidak hilang saat deploy ulang).
5.  **Database:** Menggunakan PostgreSQL via Supabase (Session Pooler Mode) untuk kompatibilitas cloud maksimal.

---

## 🛠️ Tech Stack
*   **Framework:** Laravel (PHP)
*   **Database:** PostgreSQL (Supabase)
*   **Storage:** Cloudinary Filesystem
*   **External Service:** Google Sheets API
*   **Frontend:** Blade Templates + Tailwind CSS (via CDN/Vite)
*   **Deployment:** Render (Docker Container)

---

## 🔑 Akses Admin (PENTING)
Halaman admin dilindungi oleh **HTTP Basic Auth** (Pop-up Keamanan Browser).

*   **URL:** `https://umkm-salsabila.onrender.com/admin`
*   **Username:** `admin`
*   **Password:** `admin123`

*(Pastikan sudah menjalankan update user via route /update-admin jika belum berubah)*

---

## ⚙️ Cara Install & Menjalankan di Local
Ikuti langkah ini jika ingin menjalankan project di laptop sendiri (Development).

### 1. Persiapan
Pastikan sudah install:
*   PHP >= 8.2
*   Composer
*   Node.js
*   Database (PostgreSQL / MySQL XAMPP)

### 2. Setup Project
```bash
# Clone repository
git clone https://github.com/Davaihza/Capstone-Project-Salsabila.git

# Masuk folder
cd Capstone-Project-Salsabila

# Install dependency PHP
composer install

# Install dependency Frontend
npm install && npm run build
```

### 3. Konfigurasi Environment (.env)
Copy file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```
Lalu edit file `.env` dan sesuaikan:
```env
APP_NAME="Warung Salsabila"
APP_ENV=local
APP_KEY= # Generate pakai command di bawah
APP_URL=http://localhost:8000

# Database (Sesuaikan dengan DB lokal/Supabase kamu)
DB_CONNECTION=pgsql
DB_HOST=aws-0-ap-southeast-1.pooler.supabase.com
...

# Cloudinary (Untuk Upload Gambar)
CLOUDINARY_URL=cloudinary://...

# Google Sheets (Untuk Log Pesanan)
GOOGLE_SHEETS_ID=ID_SPREADSHEET_KAMU
GOOGLE_SHEETS_CREDENTIALS=PATH_TO_JSON_FILE
```

### 4. Setup Database
```bash
# Generate Key
php artisan key:generate

# Migrasi Tabel & Isi Data Awal (Seeding)
php artisan migrate --seed
```

### 5. Jalankan Server
```bash
php artisan serve
```
Buka browser di `http://localhost:8000`.

---

## ☁️ Panduan Deployment (Render.com)
Project ini sudah dikonfigurasi menggunakan **Dockerfile** untuk deployment otomatis di Render (Free Tier).

### Setting Environment Variables di Render
Saat membuat web service baru di Render, pastikan kamu menambahkan Environment Variables berikut di menu **"Environment"**:

| Variable | Value (Contoh) | Catatan |
| :--- | :--- | :--- |
| `APP_KEY` | `base64:....` | Copy dari .env lokal |
| `APP_URL` | `https://nm-app.onrender.com` | URL Render kamu |
| `ASSET_URL` | `https://nm-app.onrender.com` | **PENTING:** Supaya CSS/Gambar tidak broken (HTTPS) |
| `DB_CONNECTION` | `pgsql` | |
| `DB_HOST` | `aws-0...pooler.supabase.com` | Pakai **Session Pooler** (Port 5432/6543) |
| `DB_DATABASE` | `postgres` | |
| `DB_USERNAME` | `postgres.xxx` | |
| `DB_PASSWORD` | `rahasia` | |
| `CLOUDINARY_URL` | `cloudinary://...` | Dari Dashboard Cloudinary |
| `GOOGLE_SHEETS_ID`| `151D...` | ID Sheet dari URL Browser |
| `GOOGLE_SHEETS_CREDENTIALS` | `{ "type": "service_account", ... }` | Copy **SELURUH ISI** file JSON kredensial ke sini |

---

## 📝 Catatan Penting untuk Pengembangan
*   **Google Sheets:** Jika ingin mengubah status pesanan agar sinkron, pastikan `GOOGLE_SHEETS_ID` sudah benar dan email Service Account (`client_email` di JSON) sudah dijadikan **Editor** di file Spreadsheetnya.
*   **Gambar Produk:** Jangan simpan gambar di `public/storage` lokal saat production, karena Render akan menghapusnya saat restart. Selalu gunakan Cloudinary yang sudah terintegrasi di project ini.

---
**Capstone Project 2026** - Warung Salsabila Digitalization

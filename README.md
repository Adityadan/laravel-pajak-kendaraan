# 🚗 Backend - Aplikasi Pajak Kendaraan

Backend REST API menggunakan Laravel 10 untuk menyediakan data pajak kendaraan dengan fitur:

- Filter berdasarkan jenis kendaraan dan status pembayaran
- Rekap data pajak (terbayar dan tunggakan)
- Mengambil data dari API eksternal dan mengolahnya di server

---

## 🔧 Teknologi

- Laravel 10
- PHP >= 8.1
- Laravel HTTP Client (Guzzle)
- CORS (untuk komunikasi dengan frontend)

---

## ⚙️ Instalasi

### 1. Clone repository dan masuk ke folder backend

```bash
cd pajak-kendaraan
composer install
```
### 2. Ambil data dengan menjalankan command ini 

```bash
php artisan app:fetch-pajak-kendaraan

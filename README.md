# 🚗 BBI HUB Console

> **BBI HUB Console** adalah dashboard web resmi untuk ekosistem **BBI HUB**, dibangun menggunakan **Laravel 12** dan **Filament 4**.  
> Aplikasi ini menyediakan sistem kontrol terpusat untuk **SuperAdmin** dan **Owner Bengkel** dalam mengelola bengkel, karyawan, dan laporan operasional.

---

## 🧭 Fitur Utama

- 🔐 Autentikasi & manajemen role berbasis **Spatie Permission** & **Filament Shield**
- 🧱 Multi-panel Filament (SuperAdmin & Owner)
- ⚙️ CRUD otomatis dengan resource Filament
- 💹 Dashboard interaktif & laporan analitik
- 👥 Manajemen bengkel, karyawan, layanan, dan transaksi
- 🧩 Modular & scalable — siap diintegrasikan dengan aplikasi Flutter (Admin & Mekanik)

---

## 💻 Tech Stack

| Teknologi | Ikon | Fungsi |
|------------|------|--------|
| **Laravel 12** | 🐘 | Framework backend utama |
| **Filament 4** | ✨ | Dashboard admin & resource CRUD |
| **Spatie Permission** | 🔐 | Role & permission management |
| **Filament Shield** | 🛡️ | Otomatisasi policy dan proteksi panel |
| **Tailwind CSS** | 🎨 | Styling modern & responsif |
| **Livewire + Vite** | ⚡ | Interaktivitas tanpa reload & bundling frontend |

---

## 🧰 Persiapan Sebelum Instalasi

Pastikan sudah terpasang:
- 🧩 PHP **>= 8.2**
- 🧱 Composer
- 🐬 MySQL / PostgreSQL / SQLite
- 🧶 Node.js + npm / pnpm (opsional, untuk build aset)
- 🔑 Git

---

## 🚀 Cara Instalasi

Jalankan langkah-langkah berikut di terminal:

```bash
# Clone repositori
git clone https://github.com/siberbot88/bbi-hub-console.git
cd bbi-hub-console

# Install dependency Laravel
composer install

# Salin file environment
cp .env.example .env

# Konfigurasi database di .env
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=bbi_hub_dashboard
# DB_USERNAME=root
# DB_PASSWORD=

# Generate app key
php artisan key:generate

# Jalankan migrasi & seeder
php artisan migrate --seed

# (Opsional) Install & build frontend
npm install && npm run build
# atau
pnpm install && pnpm run build

# Jalankan server lokal
php artisan serve

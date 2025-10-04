# 🚗 BBI HUB Console

> **BBI HUB Console** adalah dashboard web resmi untuk ekosistem **BBI HUB**, dibangun menggunakan **Laravel 12** dan **Filament 4**.  
> Aplikasi ini menyediakan sistem kontrol terpusat untuk **SuperAdmin** dan **Owner Bengkel** dalam mengelola bengkel, karyawan, dan laporan operasional.

---

## 🧭 Fitur Utama

- 🔐 Autentikasi & manajemen role berbasis **Spatie Permission** & **Filament Shield**
- 🧱 Multi-panel Filament (**SuperAdmin** & **Owner**)
- ⚙️ CRUD otomatis dengan resource Filament
- 💹 Dashboard interaktif & laporan analitik
- 👥 Manajemen bengkel, karyawan, layanan, dan transaksi
- 🧩 Modular & scalable — siap diintegrasikan dengan aplikasi **Flutter (Admin & Mekanik)**

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

<p align="center">
  <img src="https://cdn.worldvectorlogo.com/logos/laravel-2.svg" alt="Laravel" height="48" />
  <img src="https://cdn.worldvectorlogo.com/logos/tailwindcss.svg" alt="TailwindCSS" height="48" />
  <img src="https://vitejs.dev/logo.svg" alt="Vite" height="48" />
  <img src="https://avatars.githubusercontent.com/u/7535935?s=200&v=4" alt="Spatie" height="48" />
  <img src="https://cdn.worldvectorlogo.com/logos/nodejs-icon.svg" alt="Node.js" height="48" />
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/Filament-4.x-E34F26?logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?logo=tailwindcss&logoColor=white" />
  <img src="https://img.shields.io/badge/Livewire-3.x-FB70A9?logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/Vite-5.x-646CFF?logo=vite&logoColor=white" />
  <img src="https://img.shields.io/badge/Spatie%20Permission-6.x-FFC107?logo=shield&logoColor=white" />
  <img src="https://img.shields.io/badge/Filament%20Shield-4.x-0EA5E9?logo=shield&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-8.x-4479A1?logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Node.js-20.x-339933?logo=node.js&logoColor=white" />
</p>

---

## 🧰 Persiapan Sebelum Instalasi

Pastikan kamu sudah menyiapkan environment berikut:

- 🧩 PHP **>= 8.2**
- 🧱 Composer
- 🐬 MySQL / PostgreSQL / SQLite
- 🧶 Node.js + npm / pnpm *(opsional, untuk build aset frontend)*
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

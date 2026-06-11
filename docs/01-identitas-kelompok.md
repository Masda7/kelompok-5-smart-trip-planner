# Identitas Kelompok

---

Nama Kelompok: Kelompok 5

Nama Proyek / Aplikasi: Smart Trip Planner Aceh

Jumlah Anggota: 3 orang

Repositori: https://github.com/Masda7/kelompok-5-smart-trip-planner

---

## Anggota & Role

Anggota 1

- Nama Lengkap: Zada Rahmat Fauzie
- NIM: 230705145
- Role: Frontend Engineer
- Teknologi: Laravel Blade, Bootstrap 5, HTML, CSS, JavaScript, Leaflet.js

Anggota 2

- Nama Lengkap: Azhabul Firdaus
- NIM: 230705161
- Role: Backend Engineer
- Teknologi: Laravel 12, MySQL, REST API, JWT

Anggota 3

- Nama Lengkap: Masda Alfarisi
- NIM: 230705136
- Role: DevOps Engineer
- Teknologi: GitHub, Docker

---

## Stack Teknologi

Frontend: Laravel Blade, Bootstrap 5, HTML, CSS, JavaScript

Frontend digunakan untuk menampilkan antarmuka pengguna, halaman destinasi wisata, itinerary perjalanan, dan dashboard pengguna.

Backend: Laravel 12

Backend bertugas menyediakan layanan autentikasi pengguna, pengelolaan data wisata, pengelolaan itinerary, dan komunikasi dengan database.

Database: MySQL

Database digunakan untuk menyimpan data pengguna, destinasi wisata, kategori wisata, itinerary, dan data pendukung lainnya.

Peta & Lokasi: OpenStreetMap (OSM), Leaflet.js

OpenStreetMap digunakan sebagai sumber data peta dan koordinat lokasi destinasi wisata. Leaflet.js digunakan sebagai library JavaScript untuk menampilkan peta interaktif dan marker lokasi pada antarmuka pengguna.

API Tambahan (Opsional): OpenRouteService API

OpenRouteService digunakan untuk menghitung rute perjalanan, jarak tempuh, dan estimasi waktu antar destinasi wisata dalam itinerary.

DevOps / Infrastruktur: GitHub, Docker

GitHub digunakan sebagai repositori utama proyek dan Docker digunakan untuk mempermudah proses pengembangan serta deployment aplikasi.

---

## Arsitektur Aplikasi

Smart Trip Planner Aceh merupakan aplikasi berbasis web yang membantu wisatawan merencanakan perjalanan wisata di Aceh secara lebih terstruktur. Pengguna dapat melihat informasi destinasi wisata, memilih tempat yang ingin dikunjungi, dan menyusun itinerary perjalanan berdasarkan preferensi masing-masing.

Aplikasi 1 — Frontend

- Nama Aplikasi: Smart Trip Planner Aceh Web
- Deskripsi Singkat:

Aplikasi web yang digunakan oleh pengguna untuk melihat daftar destinasi wisata, mencari lokasi wisata berdasarkan kategori, menampilkan peta interaktif menggunakan Leaflet.js dan OpenStreetMap, serta menyusun rencana perjalanan (itinerary).

- Berkomunikasi dengan:

Trip Planner Service (Laravel Backend)

---

Aplikasi 2 — Backend (Laravel)

- Nama Aplikasi / Service: Trip Planner Service

- Deskripsi Singkat:

Layanan backend yang menangani autentikasi pengguna (JWT), pengelolaan data destinasi wisata, pengelolaan itinerary, kalkulasi estimasi biaya, serta penyimpanan data ke database MySQL.

- Menyediakan layanan untuk:

Smart Trip Planner Aceh Web

---

## Gambaran Fitur Utama

Fitur Pengguna

1. Registrasi dan Login
2. Melihat daftar destinasi wisata
3. Pencarian dan filter destinasi berdasarkan kategori
4. Melihat detail destinasi wisata beserta lokasi di peta
5. Menambahkan destinasi ke itinerary
6. Mengelola rencana perjalanan
7. Melihat estimasi biaya perjalanan
8. Melihat rute dan jarak antar destinasi (via OpenRouteService)

Fitur Admin

1. Mengelola data destinasi wisata
2. Menambah, mengubah, dan menghapus destinasi
3. Mengelola kategori wisata
4. Mengelola data pengguna
5. Memantau aktivitas penggunaan aplikasi

---

## Rencana Pengembangan

Pada tahap awal, data wisata akan dikelola secara manual oleh administrator melalui dashboard admin. Peta interaktif ditampilkan menggunakan Leaflet.js dengan sumber data dari OpenStreetMap. Pada tahap pengembangan berikutnya, aplikasi dapat diintegrasikan dengan OpenRouteService API untuk menampilkan rute perjalanan secara otomatis berdasarkan itinerary yang disusun pengguna.

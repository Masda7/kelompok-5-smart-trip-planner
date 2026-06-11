# Rencana Fitur

> Dokumentasikan minimal **5 fitur utama**

---

## Fitur 1 — Registrasi dan Login

**Role Penanggung Jawab:** `Backend`

**Sumber Data:** `Internal System (Database MySQL — tabel users)`

**Deskripsi & Ekspektasi:**
`Pengguna dapat registrasi (nama, email, password) dan melakukan login menggunakan kredensial yang valid. Backend melakukan validasi input, menyimpan password dalam bentuk hash, membuat sesi/token, dan membatasi akses halaman/fitur yang memerlukan autentikasi.`

---

## Fitur 2 — Melihat daftar destinasi wisata

**Role Penanggung Jawab:** `Frontend + Backend`

**Sumber Data:** `Internal System (Database MySQL — tabel destinasi & kategori)`

**Deskripsi & Ekspektasi:**
`Pengguna dapat melihat daftar destinasi wisata. Sistem mengambil data destinasi dari MySQL bersama informasi kategori yang terkait, kemudian menampilkannya di UI (mis. kartu destinasi atau tabel). Ekspektasinya: halaman tampil cepat, data konsisten, dan mendukung navigasi ke halaman detail.`

---

## Fitur 3 — Pencarian dan filter destinasi berdasarkan kategori

**Role Penanggung Jawab:** `Frontend + Backend`

**Sumber Data:** `Internal System (Database MySQL — tabel destinasi & kategori)`

**Deskripsi & Ekspektasi:**
`Pengguna dapat mencari destinasi (mis. berdasarkan nama/keyword) dan memfilter berdasarkan kategori. Backend menerima parameter pencarian/filter, melakukan query ke MySQL, lalu mengembalikan hasil yang sesuai. Ekspektasinya: hasil filter akurat dan ketika hasil kosong aplikasi tetap memberikan feedback.`

---

## Fitur 4 — Menambahkan destinasi ke itinerary dan mengelola rencana perjalanan

**Role Penanggung Jawab:** `Backend + Frontend`

**Sumber Data:** `Internal System (Database MySQL — tabel itinerary, itinerary_items, destinasi)`

**Deskripsi & Ekspektasi:**
`Pengguna dapat menambahkan destinasi ke itinerary dan mengelola rencana perjalanannya (tambah/hapus destinasi dalam itinerary, dan menyesuaikan susunan/rincian yang diperlukan). Sistem memastikan itinerary tersimpan per user, menjaga integritas relasi itinerary_items terhadap data destinasi, serta menampilkan ringkasan itinerary yang selalu sinkron dengan data di database.`

---

## Fitur 5 — Melihat estimasi biaya perjalanan

**Role Penanggung Jawab:** `Backend + Frontend`

**Sumber Data:** `Internal System (Database MySQL — data biaya/tarif destinasi atau komponen perkiraan)`

**Deskripsi & Ekspektasi:**
`Pengguna dapat melihat estimasi biaya berdasarkan itinerary yang dipilih. Backend menghitung total estimasi (dan bila tersedia menampilkan breakdown per destinasi/komponen), kemudian frontend menampilkan ringkasan biaya. Ekspektasinya: hasil perhitungan konsisten, dan otomatis berubah saat itinerary diperbarui.`

---

_(Salin blok di atas untuk fitur selanjutnya termasuk versi Admin.)_

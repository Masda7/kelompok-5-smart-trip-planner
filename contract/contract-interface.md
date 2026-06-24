# Contract Interface — Smart Trip Planner Aceh

**Kelompok 5 | Teknologi Informasi UIN Ar-Raniry**
**Repositori:** https://github.com/Masda7/kelompok-5-smart-trip-planner

---

> Dokumen ini adalah perjanjian resmi antara Frontend Engineer dan Backend Engineer.
> Seluruh endpoint, struktur request, dan struktur response yang tertulis di sini
> adalah acuan tetap yang tidak boleh diubah sepihak tanpa diskusi tim.

---

## Anggota & Tanggung Jawab

| Nama               | NIM       | Role              | Tanggung Jawab                               |
| ------------------ | --------- | ----------------- | -------------------------------------------- |
| Zada Rahmat Fauzie | 230705145 | Frontend Engineer | Konsumsi API, tampilkan data di Blade        |
| Azhabul Firdaus    | 230705161 | Backend Engineer  | Buat endpoint, validasi, kembalikan response |
| Masda Alfarisi     | 230705136 | DevOps Engineer   | GitHub, Docker, deployment                   |

---

## Konvensi Umum

**Base URL:**

```
http://localhost:8000/api
```

**Format request & response:** JSON

**Autentikasi:** JWT — setiap endpoint protected wajib menyertakan header:

```
Authorization: Bearer {token}
```

**Format response sukses:**

```json
{
  "data": { ... },
  "message": "sukses"
}
```

**Format response error:**

```json
{
    "message": "Pesan error",
    "errors": {
        "field": ["detail error"]
    }
}
```

**Format tanggal:** ISO 8601 — contoh: `2025-04-10T08:00:00Z`

**Format uang:** Integer dalam Rupiah (IDR) — contoh: `10000` = Rp 10.000

---

## F-01 — Registrasi dan Login

**Role Backend:** Validasi input, hash password, buat JWT token
**Role Frontend:** Kirim form, simpan token di localStorage, redirect setelah login

### Endpoints

#### `POST /api/auth/register`

Request body:

```json
{
    "name": "string — wajib",
    "email": "string — wajib, format email, unik",
    "password": "string — wajib, minimal 8 karakter"
}
```

Response sukses `201`:

```json
{
    "data": {
        "token": "eyJ0eXAiOiJKV1Qi...",
        "user": {
            "id": 1,
            "name": "Zada Rahmat Fauzie",
            "email": "zada@example.com",
            "created_at": "2025-04-10T08:00:00Z"
        }
    },
    "message": "Registrasi berhasil"
}
```

---

#### `POST /api/auth/login`

Request body:

```json
{
    "email": "string — wajib",
    "password": "string — wajib"
}
```

Response sukses `200`:

```json
{
    "data": {
        "token": "eyJ0eXAiOiJKV1Qi...",
        "user": {
            "id": 1,
            "name": "Zada Rahmat Fauzie",
            "email": "zada@example.com",
            "created_at": "2025-04-10T08:00:00Z"
        }
    },
    "message": "Login berhasil"
}
```

Response gagal `401`:

```json
{
    "message": "Email atau password salah"
}
```

---

#### `POST /api/auth/logout` 🔒 Protected

Response sukses `200`:

```json
{
    "message": "Logout berhasil"
}
```

---

#### `GET /api/auth/me` 🔒 Protected

Response sukses `200`:

```json
{
    "data": {
        "id": 1,
        "name": "Zada Rahmat Fauzie",
        "email": "zada@example.com",
        "created_at": "2025-04-10T08:00:00Z"
    }
}
```

---

## F-02 — Daftar Destinasi Wisata

**Role Backend:** Query MySQL, join tabel kategori, kembalikan data paginasi
**Role Frontend:** Tampilkan kartu destinasi, navigasi halaman

### Endpoints

#### `GET /api/destinations`

Query params (opsional):

```
?page=1&per_page=12
```

Response sukses `200`:

```json
{
    "data": [
        {
            "id": 1,
            "name": "Pantai Lhoknga",
            "description": "Pantai berpasir putih di Aceh Besar",
            "image_url": "http://localhost:8000/storage/destinasi/lhoknga.jpg",
            "location": "Aceh Besar",
            "latitude": 5.51,
            "longitude": 95.232,
            "category": {
                "id": 1,
                "name": "Pantai"
            },
            "entry_fee": 10000,
            "created_at": "2025-01-10T08:00:00Z"
        }
    ],
    "total": 8,
    "page": 1,
    "per_page": 12,
    "last_page": 1
}
```

> ⚠️ **Catatan FE:** Jika `image_url` bernilai `null`, tampilkan gambar placeholder.

---

#### `GET /api/destinations/{id}`

Response sukses `200`:

```json
{
    "data": {
        "id": 1,
        "name": "Pantai Lhoknga",
        "description": "Pantai berpasir putih di Aceh Besar",
        "image_url": "http://localhost:8000/storage/destinasi/lhoknga.jpg",
        "location": "Aceh Besar",
        "latitude": 5.51,
        "longitude": 95.232,
        "category": {
            "id": 1,
            "name": "Pantai"
        },
        "entry_fee": 10000,
        "created_at": "2025-01-10T08:00:00Z"
    }
}
```

---

#### `GET /api/categories`

Response sukses `200`:

```json
{
    "data": [
        { "id": 1, "name": "Pantai" },
        { "id": 2, "name": "Pegunungan" },
        { "id": 3, "name": "Sejarah & Budaya" },
        { "id": 4, "name": "Taman & Alam" },
        { "id": 5, "name": "Kuliner" }
    ]
}
```

---

## F-03 — Pencarian dan Filter Destinasi

**Role Backend:** Query LIKE untuk search, filter WHERE category_id
**Role Frontend:** Kirim query params, tampilkan hasil atau empty state

### Endpoints

#### `GET /api/destinations?search=...&category_id=...`

Query params (semua opsional, bisa dikombinasi):

```
?search=pantai
?category_id=1
?search=pantai&category_id=1&page=1
```

Response hasil ditemukan `200`:

```json
{
  "data": [ ... ],
  "total": 3,
  "page": 1,
  "per_page": 12,
  "last_page": 1
}
```

Response hasil kosong `200`:

```json
{
    "data": [],
    "total": 0,
    "page": 1,
    "per_page": 12,
    "last_page": 1,
    "message": "Destinasi tidak ditemukan"
}
```

> ⚠️ **Catatan BE:** Wajib return status `200` meskipun hasil kosong — BUKAN `404`.
> ⚠️ **Catatan FE:** Cek kondisi `total === 0` untuk tampilkan empty state.

---

## F-04 — Itinerary (Rencana Perjalanan)

**Role Backend:** CRUD itinerary per user, jaga relasi itinerary_items
**Role Frontend:** Tampilkan daftar itinerary, tambah/hapus destinasi

> 🔒 Semua endpoint F-04 memerlukan token JWT

### Endpoints

#### `GET /api/itineraries` 🔒

Response sukses `200`:

```json
{
  "data": [
    {
      "id": 1,
      "user_id": 1,
      "title": "Liburan Banda Aceh 2 Hari",
      "created_at": "2025-03-01T10:00:00Z",
      "items": [ ... ]
    }
  ]
}
```

---

#### `POST /api/itineraries` 🔒

Request body:

```json
{
    "title": "string — wajib"
}
```

Response sukses `201`:

```json
{
    "data": {
        "id": 1,
        "user_id": 1,
        "title": "Liburan Banda Aceh 2 Hari",
        "created_at": "2025-03-01T10:00:00Z",
        "items": []
    },
    "message": "Itinerary berhasil dibuat"
}
```

---

#### `GET /api/itineraries/{id}` 🔒

Response sukses `200`:

```json
{
  "data": {
    "id": 1,
    "user_id": 1,
    "title": "Liburan Banda Aceh 2 Hari",
    "created_at": "2025-03-01T10:00:00Z",
    "items": [
      {
        "id": 1,
        "itinerary_id": 1,
        "destination": { ... },
        "visit_date": "2025-04-10",
        "notes": "Kunjungi pagi hari",
        "order": 1
      }
    ]
  }
}
```

---

#### `DELETE /api/itineraries/{id}` 🔒

Response sukses `200`:

```json
{
    "message": "Itinerary berhasil dihapus"
}
```

---

#### `POST /api/itineraries/{id}/items` 🔒

Request body:

```json
{
    "destination_id": 1,
    "visit_date": "2025-04-10",
    "notes": "Kunjungi pagi hari",
    "order": 1
}
```

> `visit_date`, `notes`, dan `order` bersifat opsional.

Response sukses `201`:

```json
{
  "data": { ... },
  "message": "Destinasi berhasil ditambahkan ke itinerary"
}
```

---

#### `DELETE /api/itineraries/{id}/items/{item_id}` 🔒

Response sukses `200`:

```json
{
    "message": "Destinasi berhasil dihapus dari itinerary"
}
```

---

## F-05 — Estimasi Biaya Perjalanan

**Role Backend:** Hitung total entry_fee semua destinasi dalam itinerary
**Role Frontend:** Tampilkan ringkasan biaya dan breakdown per destinasi

> 🔒 Endpoint ini memerlukan token JWT

### Endpoints

#### `GET /api/itineraries/{id}/cost-estimate` 🔒

Response sukses `200`:

```json
{
    "data": {
        "itinerary_id": 1,
        "total_estimate": 15000,
        "currency": "IDR",
        "breakdown": [
            {
                "destination_id": 3,
                "destination_name": "Masjid Raya Baiturrahman",
                "entry_fee": 0,
                "other_costs": null,
                "subtotal": 0
            },
            {
                "destination_id": 1,
                "destination_name": "Pantai Lhoknga",
                "entry_fee": 10000,
                "other_costs": 5000,
                "subtotal": 15000
            }
        ]
    }
}
```

> ⚠️ **Catatan FE:** Format tampilan menggunakan `Intl.NumberFormat('id-ID')` — contoh: `Rp 15.000`
> ⚠️ **Catatan FE:** Panggil ulang endpoint ini setiap kali item itinerary berubah.

---

## Ringkasan Semua Endpoint

| Method | Endpoint                              | Auth | Fitur      |
| ------ | ------------------------------------- | ---- | ---------- |
| POST   | /api/auth/register                    | —    | F-01       |
| POST   | /api/auth/login                       | —    | F-01       |
| POST   | /api/auth/logout                      | 🔒   | F-01       |
| GET    | /api/auth/me                          | 🔒   | F-01       |
| GET    | /api/categories                       | —    | F-02       |
| GET    | /api/destinations                     | —    | F-02, F-03 |
| GET    | /api/destinations/{id}                | —    | F-02       |
| GET    | /api/itineraries                      | 🔒   | F-04       |
| POST   | /api/itineraries                      | 🔒   | F-04       |
| GET    | /api/itineraries/{id}                 | 🔒   | F-04       |
| DELETE | /api/itineraries/{id}                 | 🔒   | F-04       |
| POST   | /api/itineraries/{id}/items           | 🔒   | F-04       |
| DELETE | /api/itineraries/{id}/items/{item_id} | 🔒   | F-04       |
| GET    | /api/itineraries/{id}/cost-estimate   | 🔒   | F-05       |

---

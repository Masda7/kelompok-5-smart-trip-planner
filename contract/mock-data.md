// ============================================================
// MOCK DATA — Smart Trip Planner
// Kelompok 5 | Teknologi Informasi UIN Ar-Raniry
// ============================================================
// Cara pakai:
// import { mockDestinations, mockCategories, mockItineraries } from './mockData'
//
// Nanti kalau backend sudah jadi, tinggal ganti import-nya
// ke fetch('/api/...') — tampilan tidak perlu diubah sama sekali
// ============================================================

import type {
Category,
Destination,
Itinerary,
CostEstimateResponse,
UserProfile,
AuthResponse,
} from "./contract-interface";

// ─────────────────────────────────────────
// CATEGORIES
// ─────────────────────────────────────────

export const mockCategories: Category[] = [
{ id: 1, name: "Pantai" },
{ id: 2, name: "Pegunungan" },
{ id: 3, name: "Sejarah & Budaya" },
{ id: 4, name: "Taman & Alam" },
{ id: 5, name: "Kuliner" },
];

// ─────────────────────────────────────────
// DESTINATIONS
// ─────────────────────────────────────────

export const mockDestinations: Destination[] = [
{
id: 1,
name: "Pantai Lhoknga",
description:
"Pantai berpasir putih dengan ombak yang cocok untuk surfing. Salah satu pantai paling populer di Aceh Besar.",
image_url: "https://picsum.photos/seed/lhoknga/600/400",
location: "Aceh Besar",
category: { id: 1, name: "Pantai" },
entry_fee: 10000,
created_at: "2025-01-10T08:00:00Z",
},
{
id: 2,
name: "Pantai Lampuuk",
description:
"Pantai indah dengan pasir putih dan air jernih, terletak tidak jauh dari pusat kota Banda Aceh.",
image_url: "https://picsum.photos/seed/lampuuk/600/400",
location: "Aceh Besar",
category: { id: 1, name: "Pantai" },
entry_fee: 10000,
created_at: "2025-01-11T08:00:00Z",
},
{
id: 3,
name: "Masjid Raya Baiturrahman",
description:
"Ikon kota Banda Aceh. Masjid bersejarah dengan arsitektur megah yang berdiri sejak abad ke-17.",
image_url: "https://picsum.photos/seed/baiturrahman/600/400",
location: "Banda Aceh",
category: { id: 3, name: "Sejarah & Budaya" },
entry_fee: 0,
created_at: "2025-01-12T08:00:00Z",
},
{
id: 4,
name: "Museum Tsunami Aceh",
description:
"Museum peringatan bencana tsunami 2004. Dirancang arsitek Ridwan Kamil, menjadi simbol ketangguhan masyarakat Aceh.",
image_url: "https://picsum.photos/seed/tsunami/600/400",
location: "Banda Aceh",
category: { id: 3, name: "Sejarah & Budaya" },
entry_fee: 0,
created_at: "2025-01-13T08:00:00Z",
},
{
id: 5,
name: "Gunung Seulawah Agam",
description:
"Gunung berapi aktif yang menjadi latar pemandangan kota Banda Aceh. Populer untuk pendakian dan wisata alam.",
image_url: "https://picsum.photos/seed/seulawah/600/400",
location: "Aceh Besar",
category: { id: 2, name: "Pegunungan" },
entry_fee: 25000,
created_at: "2025-01-14T08:00:00Z",
},
{
id: 6,
name: "Taman Sari Gunongan",
description:
"Taman bersejarah peninggalan Kerajaan Aceh Darussalam. Dibangun oleh Sultan Iskandar Muda untuk permaisurinya.",
image_url: "https://picsum.photos/seed/gunongan/600/400",
location: "Banda Aceh",
category: { id: 3, name: "Sejarah & Budaya" },
entry_fee: 5000,
created_at: "2025-01-15T08:00:00Z",
},
{
id: 7,
name: "Hutan Mangrove Langsa",
description:
"Kawasan hutan mangrove yang lebat dengan jembatan kayu sepanjang 2 km. Cocok untuk wisata alam dan foto.",
image_url: "https://picsum.photos/seed/mangrove/600/400",
location: "Langsa",
category: { id: 4, name: "Taman & Alam" },
entry_fee: 15000,
created_at: "2025-01-16T08:00:00Z",
},
{
id: 8,
name: "Mie Aceh Razali",
description:
"Warung mie Aceh legendaris yang sudah berdiri puluhan tahun. Wajib dicoba saat berkunjung ke Banda Aceh.",
image_url: "https://picsum.photos/seed/mieaceh/600/400",
location: "Banda Aceh",
category: { id: 5, name: "Kuliner" },
entry_fee: 0,
created_at: "2025-01-17T08:00:00Z",
},
];

// ─────────────────────────────────────────
// USER (simulasi sudah login)
// ─────────────────────────────────────────

export const mockUser: UserProfile = {
id: 1,
name: "Zada",
email: "zada@student.ar-raniry.ac.id",
created_at: "2025-01-01T00:00:00Z",
};

export const mockAuthResponse: AuthResponse = {
token: "mock-jwt-token-tidak-valid-ini-palsu",
user: mockUser,
};

// ─────────────────────────────────────────
// ITINERARIES
// ─────────────────────────────────────────

export const mockItineraries: Itinerary[] = [
{
id: 1,
user_id: 1,
title: "Liburan Banda Aceh 2 Hari",
created_at: "2025-03-01T10:00:00Z",
items: [
{
id: 1,
itinerary_id: 1,
destination: mockDestinations[2], // Masjid Raya Baiturrahman
visit_date: "2025-04-10",
notes: "Kunjungi pagi hari sebelum ramai",
order: 1,
},
{
id: 2,
itinerary_id: 1,
destination: mockDestinations[3], // Museum Tsunami
visit_date: "2025-04-10",
notes: "Bawa dompet, ada parkir berbayar",
order: 2,
},
{
id: 3,
itinerary_id: 1,
destination: mockDestinations[0], // Pantai Lhoknga
visit_date: "2025-04-11",
notes: null,
order: 3,
},
],
},
{
id: 2,
user_id: 1,
title: "Weekend Trip Pantai",
created_at: "2025-03-05T09:00:00Z",
items: [
{
id: 4,
itinerary_id: 2,
destination: mockDestinations[1], // Pantai Lampuuk
visit_date: "2025-04-20",
notes: "Bawa sunscreen",
order: 1,
},
{
id: 5,
itinerary_id: 2,
destination: mockDestinations[0], // Pantai Lhoknga
visit_date: "2025-04-20",
notes: null,
order: 2,
},
],
},
];

// ─────────────────────────────────────────
// COST ESTIMATE
// ─────────────────────────────────────────

export const mockCostEstimate: CostEstimateResponse = {
itinerary_id: 1,
total_estimate: 15000,
currency: "IDR",
breakdown: [
{
destination_id: 3,
destination_name: "Masjid Raya Baiturrahman",
entry_fee: 0,
other_costs: null,
subtotal: 0,
},
{
destination_id: 4,
destination_name: "Museum Tsunami Aceh",
entry_fee: 0,
other_costs: null,
subtotal: 0,
},
{
destination_id: 1,
destination_name: "Pantai Lhoknga",
entry_fee: 10000,
other_costs: 5000,
subtotal: 15000,
},
],
};

// ─────────────────────────────────────────
// HELPER FUNCTIONS
// ─────────────────────────────────────────

// Simulasi pencarian & filter (yang nanti dilakukan backend)
export function searchDestinations(
search?: string,
category_id?: number,
): Destination[] {
return mockDestinations.filter((d) => {
const matchSearch = search
? d.name.toLowerCase().includes(search.toLowerCase()) ||
d.description.toLowerCase().includes(search.toLowerCase())
: true;
const matchCategory = category_id ? d.category.id === category_id : true;
return matchSearch && matchCategory;
});
}

// Format harga ke Rupiah
export function formatRupiah(amount: number): string {
return new Intl.NumberFormat("id-ID", {
style: "currency",
currency: "IDR",
minimumFractionDigits: 0,
}).format(amount);
}
// Contoh: formatRupiah(10000) → "Rp 10.000"

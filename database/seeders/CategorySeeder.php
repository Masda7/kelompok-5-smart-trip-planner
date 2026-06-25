<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Destination;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        // Isi kategori
        $categories = [
            ['name' => 'Pantai'],
            ['name' => 'Pegunungan'],
            ['name' => 'Sejarah & Budaya'],
            ['name' => 'Taman & Alam'],
            ['name' => 'Kuliner'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Isi destinasi
        $destinations = [
            ['category_id' => 1, 'name' => 'Pantai Lhoknga', 'description' => 'Pantai berpasir putih dengan ombak yang cocok untuk surfing.', 'location' => 'Aceh Besar', 'latitude' => 5.4707, 'longitude' => 95.2366, 'entry_fee' => 10000],
            ['category_id' => 1, 'name' => 'Pantai Lampuuk', 'description' => 'Pantai indah dengan pasir putih dan air jernih.', 'location' => 'Aceh Besar', 'latitude' => 5.5100, 'longitude' => 95.2320, 'entry_fee' => 10000],
            ['category_id' => 3, 'name' => 'Masjid Raya Baiturrahman', 'description' => 'Ikon kota Banda Aceh dengan arsitektur megah sejak abad ke-17.', 'location' => 'Banda Aceh', 'latitude' => 5.5535, 'longitude' => 95.3178, 'entry_fee' => 0],
            ['category_id' => 3, 'name' => 'Museum Tsunami Aceh', 'description' => 'Museum peringatan bencana tsunami 2004, dirancang Ridwan Kamil.', 'location' => 'Banda Aceh', 'latitude' => 5.5483, 'longitude' => 95.3174, 'entry_fee' => 0],
            ['category_id' => 2, 'name' => 'Gunung Seulawah Agam', 'description' => 'Gunung berapi aktif yang populer untuk pendakian.', 'location' => 'Aceh Besar', 'latitude' => 5.4477, 'longitude' => 95.6318, 'entry_fee' => 25000],
            ['category_id' => 3, 'name' => 'Taman Sari Gunongan', 'description' => 'Taman bersejarah peninggalan Kerajaan Aceh Darussalam.', 'location' => 'Banda Aceh', 'latitude' => 5.5547, 'longitude' => 95.3194, 'entry_fee' => 5000],
            ['category_id' => 4, 'name' => 'Hutan Mangrove Langsa', 'description' => 'Kawasan hutan mangrove dengan jembatan kayu sepanjang 2 km.', 'location' => 'Langsa', 'latitude' => 4.4689, 'longitude' => 97.9674, 'entry_fee' => 15000],
            ['category_id' => 5, 'name' => 'Mie Aceh Razali', 'description' => 'Warung mie Aceh legendaris yang sudah berdiri puluhan tahun.', 'location' => 'Banda Aceh', 'latitude' => 5.5490, 'longitude' => 95.3190, 'entry_fee' => 0],
        ];

        foreach ($destinations as $dest) {
            Destination::create($dest);
        }
    }
}
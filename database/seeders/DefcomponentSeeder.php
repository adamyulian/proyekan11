<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefcomponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            ['name' => 'Tukang Kayu', 'type' => 'Tenaga Kerja', 'price' => 3000000, 'description' => 'Tukang Kayu dengan pengalaman 10 tahun', 'defunit_id' => 1, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Batu', 'type' => 'Tenaga Kerja', 'price' => 6000000, 'description' => 'Tukang Batu untuk dinding dan pondasi', 'defunit_id' => 2, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Las', 'type' => 'Tenaga Kerja', 'price' => 5300000, 'description' => 'Tukang Las untuk struktur logam', 'defunit_id' => 3, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pasir Urug', 'type' => 'Bahan', 'price' => 1300000, 'description' => 'Pasir Urug untuk pondasi', 'defunit_id' => 4, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Semen', 'type' => 'Bahan', 'price' => 1000000, 'description' => 'Semen portland untuk beton', 'defunit_id' => 5, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Batu Bata', 'type' => 'Bahan', 'price' => 2000000, 'description' => 'Batu bata merah untuk dinding', 'defunit_id' => 6, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Cangkul', 'type' => 'Peralatan', 'price' => 200000, 'description' => 'Cangkul untuk menggali tanah', 'defunit_id' => 7, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Gergaji', 'type' => 'Peralatan', 'price' => 300000, 'description' => 'Gergaji untuk memotong kayu', 'defunit_id' => 8, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Bor Tangan', 'type' => 'Peralatan', 'price' => 300000, 'description' => 'Bor tangan untuk pengeboran ringan', 'defunit_id' => 9, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Plester', 'type' => 'Tenaga Kerja', 'price' => 5300000, 'description' => 'Tukang Plester untuk finishing dinding', 'defunit_id' => 10, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Cat Dinding', 'type' => 'Bahan', 'price' => 800000, 'description' => 'Cat dinding untuk finishing interior', 'defunit_id' => 11, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Mesin Bor', 'type' => 'Peralatan', 'price' => 700000, 'description' => 'Mesin bor listrik untuk pengeboran berat', 'defunit_id' => 12, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Cat', 'type' => 'Tenaga Kerja', 'price' => 5200000, 'description' => 'Tukang Cat untuk finishing dinding', 'defunit_id' => 13, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Kayu Jati', 'type' => 'Bahan', 'price' => 2300000, 'description' => 'Kayu Jati berkualitas tinggi', 'defunit_id' => 14, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Linggis', 'type' => 'Peralatan', 'price' => 330000, 'description' => 'Linggis untuk pengungkit', 'defunit_id' => 15, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Kawat Bendrat', 'type' => 'Bahan', 'price' => 300000, 'description' => 'Kawat Bendrat untuk pengikat', 'defunit_id' => 16, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Beton Ready Mix', 'type' => 'Bahan', 'price' => 8000000, 'description' => 'Beton siap pakai', 'defunit_id' => 17, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Palang Besi', 'type' => 'Peralatan', 'price' => 400000, 'description' => 'Palang besi untuk pengungkit berat', 'defunit_id' => 18, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tangga Aluminium', 'type' => 'Peralatan', 'price' => 1300000, 'description' => 'Tangga aluminium untuk pekerjaan ketinggian', 'defunit_id' => 19, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Batu Kali', 'type' => 'Bahan', 'price' => 1000000, 'description' => 'Batu kali untuk pondasi', 'defunit_id' => 20, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Paku 5 cm', 'type' => 'Bahan', 'price' => 200000, 'description' => 'Paku 5 cm untuk konstruksi', 'defunit_id' => 21, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Palu Besi', 'type' => 'Peralatan', 'price' => 130000, 'description' => 'Palu besi untuk memaku', 'defunit_id' => 22, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Keramik Lantai', 'type' => 'Bahan', 'price' => 3300000, 'description' => 'Keramik lantai berkualitas tinggi', 'defunit_id' => 23, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Skop', 'type' => 'Peralatan', 'price' => 230000, 'description' => 'Skop untuk mengangkat material', 'defunit_id' => 24, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tang Kombinasi', 'type' => 'Peralatan', 'price' => 200000, 'description' => 'Tang kombinasi untuk berbagai fungsi', 'defunit_id' => 25, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Gergaji Mesin', 'type' => 'Peralatan', 'price' => 2300000, 'description' => 'Gergaji mesin untuk pemotongan cepat', 'defunit_id' => 26, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Triplek', 'type' => 'Bahan', 'price' => 800000, 'description' => 'Triplek untuk plafon', 'defunit_id' => 27, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Listrik', 'type' => 'Tenaga Kerja', 'price' => 6300000, 'description' => 'Tukang listrik untuk instalasi', 'defunit_id' => 28, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pipa PVC', 'type' => 'Bahan', 'price' => 300000, 'description' => 'Pipa PVC untuk saluran air', 'defunit_id' => 29, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pompa Air', 'type' => 'Peralatan', 'price' => 2000000, 'description' => 'Pompa air listrik', 'defunit_id' => 30, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pasir Pasang', 'type' => 'Bahan', 'price' => 1200000, 'description' => 'Pasir pasang untuk adukan', 'defunit_id' => 31, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Plafon', 'type' => 'Tenaga Kerja', 'price' => 5300000, 'description' => 'Tukang plafon untuk instalasi plafon', 'defunit_id' => 32, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Sekop', 'type' => 'Peralatan', 'price' => 130000, 'description' => 'Sekop untuk mengangkat material', 'defunit_id' => 33, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Besi Beton', 'type' => 'Bahan', 'price' => 6000000, 'description' => 'Besi beton untuk struktur', 'defunit_id' => 34, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tangga Lipat', 'type' => 'Peralatan', 'price' => 1800000, 'description' => 'Tangga lipat untuk pekerjaan ketinggian', 'defunit_id' => 35, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Palu Karet', 'type' => 'Peralatan', 'price' => 120000, 'description' => 'Palu karet untuk memalu tanpa merusak', 'defunit_id' => 36, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Kaca Jendela', 'type' => 'Bahan', 'price' => 3000000, 'description' => 'Kaca jendela tempered', 'defunit_id' => 37, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tang Kombinasi', 'type' => 'Peralatan', 'price' => 230000, 'description' => 'Tang kombinasi multifungsi', 'defunit_id' => 38, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Pipa', 'type' => 'Tenaga Kerja', 'price' => 6200000, 'description' => 'Tukang pipa untuk instalasi pipa air', 'defunit_id' => 39, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pompa Air', 'type' => 'Peralatan', 'price' => 1900000, 'description' => 'Pompa air otomatis', 'defunit_id' => 40, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Keramik Dinding', 'type' => 'Bahan', 'price' => 4000000, 'description' => 'Keramik dinding berkualitas', 'defunit_id' => 41, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Sekop Besi', 'type' => 'Peralatan', 'price' => 200000, 'description' => 'Sekop besi untuk mengangkat material', 'defunit_id' => 42, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pasir Hitam', 'type' => 'Bahan', 'price' => 1800000, 'description' => 'Pasir hitam untuk adukan', 'defunit_id' => 43, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Kaca', 'type' => 'Tenaga Kerja', 'price' => 6300000, 'description' => 'Tukang kaca untuk instalasi kaca', 'defunit_id' => 44, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Cangkul Besi', 'type' => 'Peralatan', 'price' => 220000, 'description' => 'Cangkul besi untuk menggali tanah', 'defunit_id' => 45, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Kayu Meranti', 'type' => 'Bahan', 'price' => 2800000, 'description' => 'Kayu meranti berkualitas tinggi', 'defunit_id' => 46, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Linggis Besi', 'type' => 'Peralatan', 'price' => 300000, 'description' => 'Linggis besi untuk pengungkit', 'defunit_id' => 47, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Tukang Keramik', 'type' => 'Tenaga Kerja', 'price' => 6400000, 'description' => 'Tukang keramik untuk pemasangan keramik', 'defunit_id' => 48, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Pasir Pasir', 'type' => 'Bahan', 'price' => 1300000, 'description' => 'Pasir untuk adukan', 'defunit_id' => 49, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
            ['name' => 'Gergaji Kayu', 'type' => 'Peralatan', 'price' => 300000, 'description' => 'Gergaji untuk memotong kayu', 'defunit_id' => 30, 'defbrand_id' => rand(1, 30), 'user_id' => 1, 'is_published' => true],
        ];

        DB::table('defcomponents')->insert($data);
    }
}

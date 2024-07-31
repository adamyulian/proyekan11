<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DefbrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $companies = [
            ['name' => 'PT. Sika Indonesia', 'industry' => 'Construction Materials', 'website_url' => 'http://sika.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Holcim Indonesia', 'industry' => 'Building Materials', 'website_url' => 'http://holcim.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Semen Indonesia', 'industry' => 'Building Materials', 'website_url' => 'http://semenindonesia.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Tiga Roda', 'industry' => 'Construction Materials', 'website_url' => 'http://tigaroda.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Wika Beton', 'industry' => 'Concrete Products', 'website_url' => 'http://wikabeton.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Bina Usaha', 'industry' => 'Construction Equipment', 'website_url' => 'http://binausaha.com', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Sumber Alam', 'industry' => 'Building Materials', 'website_url' => 'http://sumberalam.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. ArcelorMittal Indonesia', 'industry' => 'Structural Steel', 'website_url' => 'http://arcelormittal.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Kembar Teknika', 'industry' => 'Construction Equipment', 'website_url' => 'http://kembarteknika.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Cipta Karya', 'industry' => 'Engineering Services', 'website_url' => 'http://ciptakarya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Sumber Berkat', 'industry' => 'Building Materials', 'website_url' => 'http://sumberberkat.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Mitra Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://mitrakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Proyek Mandiri', 'industry' => 'Construction Services', 'website_url' => 'http://proyekmandiri.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Mega Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://megakonstruksi.com', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Bumi Pratama', 'industry' => 'Construction Services', 'website_url' => 'http://bumipratama.com', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Adhi Beton', 'industry' => 'Concrete Products', 'website_url' => 'http://adhibeton.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Beton Konstruksi', 'industry' => 'Concrete Products', 'website_url' => 'http://betonkonstruksi.com', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Bangun Jaya', 'industry' => 'Construction Services', 'website_url' => 'http://bangunjaya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Tiga Satu', 'industry' => 'Construction Services', 'website_url' => 'http://tigasiswa.com', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Karya Sejati', 'industry' => 'Construction Services', 'website_url' => 'http://karyasejati.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Kencana Perkasa', 'industry' => 'Construction Equipment', 'website_url' => 'http://kencanaperkasa.com', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Fajar Jaya', 'industry' => 'Construction Materials', 'website_url' => 'http://fajarjaya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Surya Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://suryakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Mandiri Alam', 'industry' => 'Construction Services', 'website_url' => 'http://mandirialam.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Maju Bersama', 'industry' => 'Construction Services', 'website_url' => 'http://majubersama.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Sumber Jaya', 'industry' => 'Construction Services', 'website_url' => 'http://sumberjaya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Jaya Beton', 'industry' => 'Concrete Products', 'website_url' => 'http://jayabeton.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Indah Karya', 'industry' => 'Engineering Services', 'website_url' => 'http://indahkarya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Sinar Jaya', 'industry' => 'Construction Services', 'website_url' => 'http://sinarjaya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Rintis Karya', 'industry' => 'Construction Services', 'website_url' => 'http://rintiskarya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Nusantara Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://nusantarakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Artha Mandiri', 'industry' => 'Construction Services', 'website_url' => 'http://arthamandiri.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Karya Beton', 'industry' => 'Concrete Products', 'website_url' => 'http://karyabeton.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Prisma Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://prismakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Bangun Mandiri', 'industry' => 'Construction Services', 'website_url' => 'http://bangunmandiri.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Sumber Agung', 'industry' => 'Construction Services', 'website_url' => 'http://sumberagung.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Karya Utama', 'industry' => 'Construction Services', 'website_url' => 'http://karyautama.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Mega Alam', 'industry' => 'Construction Services', 'website_url' => 'http://megaalam.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Senayan Jaya', 'industry' => 'Construction Services', 'website_url' => 'http://senayanjaya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Cipta Beton', 'industry' => 'Concrete Products', 'website_url' => 'http://ciptabeton.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Tunas Jaya', 'industry' => 'Construction Services', 'website_url' => 'http://tunasjaya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Bina Karya', 'industry' => 'Construction Services', 'website_url' => 'http://binakarya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Trimitra Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://trimitrakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Gemilang Karya', 'industry' => 'Construction Services', 'website_url' => 'http://gemilangkarya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Sarana Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://saranakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Dinamika Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://dinamikakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Elang Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://elangkonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Harapan Karya', 'industry' => 'Construction Services', 'website_url' => 'http://harapankarya.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Pratama Konstruksi', 'industry' => 'Construction Services', 'website_url' => 'http://pratamakonstruksi.co.id', 'is_published' => true, 'user_id' => 1],
            ['name' => 'PT. Mandiri Bangun', 'industry' => 'Construction Services', 'website_url' => 'http://mandiribangun.co.id', 'is_published' => true, 'user_id' => 1],
        ];

        DB::table('defbrands')->insert($companies);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Scholl;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'user1',
            'username' => 'adm123',
            'password'=> bcrypt('123'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user2',
            'username' => 'opr123',
            'password'=> bcrypt('123'),
            'role' => 'operator',
        ]);
        Scholl::create([
            'nama'=> 'SMPN 2 Singaparna',
            'kepsek'=> 'Prof. Dr. Aceng Kosasih, M. Ag.',
            'ft_kepsek'=> 'Aceng.jpg',
            'foto'=> 'nedusi.jpg',
            'logo'=> 'logo_nedusi.png',
            'nspn'=> '20253259',
            'alamat'=> ' Jl. Raya Pemda, Singasari, Kec. Singaparna',
            'ft_lokasi'=> 'maps.png',
            'kontak'=> '(0123) 6324',
            'visi_misi'=> 'Mewujudkan peserta didik yang beriman, berkarakter,cerdas, dan berdaya saing di era global.',
            'thn_berdiri'=> '2007',
            'deskripsi'=> 'SMP Negeri 2 Singaparna adalah sekolah menengah pertama yang berlokasi di Jl. Raya Pemda, Singasari, Kec. Singaparna, Kab. Tasikmalaya. 
            Sekolah ini berkomitmen menciptakan lingkungan belajar yang disiplin, nyaman, dan berkarakter dengan dukungan guru profesional serta fasilitas yang memadai. 
            Melalui berbagai kegiatan akademik dan ekstrakurikuler, SMPN 2 Singaparna terus berupaya menumbuhkan generasi yang berprestasi, kreatif, dan berakhlak mulia.',
        ]);
    }
}

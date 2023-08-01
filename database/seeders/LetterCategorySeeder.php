<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LetterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'letter_category_name' => 'Surat Keputusan (01.)'
            ],
            [
                'letter_category_name' => 'Surat Undangan (02.)'
            ],
            [
                'letter_category_name' => 'Surat Permohonan (03.)'
            ],
            [
                'letter_category_name' => 'Surat Pemberitahuan (04.)'
            ],
            [
                'letter_category_name' => 'Surat Peminjaman (05.)'
            ],
            [
                'letter_category_name' => 'Surat Pernyataan (06.)'
            ],
            [
                'letter_category_name' => 'Surat Mandat (07.)'
            ],
            [
                'letter_category_name' => 'Surat Tugas (08.)'
            ],
            [
                'letter_category_name' => 'Surat Keterangan (09.)'
            ],
            [
                'letter_category_name' => 'Surat Rekomendasi (10.)'
            ],
            [
                'letter_category_name' => 'Surat Balasan (11.)'
            ],
            [
                'letter_category_name' => 'Surat Perintah Perjalanan Dinas (12.)'
            ],
            [
                'letter_category_name' => 'Sertifikat (13.)'
            ],
            [
                'letter_category_name' => 'Perjanjian Kerja (14.)'
            ],
            [
                'letter_category_name' => 'Surat Pengantar (15.)'
            ],
        ];

        // Change it here based on the model
        $model = new \App\Models\LetterCategory;

        DB::table($model->getTable())->insertOrIgnore($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WhisperWallSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            ['Hari ini capek sekali, tapi aku tetap berhasil menyelesaikan satu hal kecil. Semoga kamu juga pelan-pelan ya.', 42, 18, now()->subMinutes(15)],
            ['Kadang cuma ingin didengar tanpa dinasihati. Terima kasih sudah ada di ruang ini.', 56, 31, now()->subMinutes(45)],
            ['Malam ini rindu rumah. Untuk yang sedang jauh dari keluarga, kita pasti bisa melewatinya.', 89, 44, now()->subHours(2)],
            ['Hari ini akhirnya berani bercerita ke satu orang yang kupercaya. Rasanya lega sekali.', 37, 22, now()->subHours(3)],
        ];

        foreach ($rows as [$content, $hug, $support, $time]) {
            DB::table('whisper_walls')->insert([
                'content'       => $content,
                'is_anonymous'  => true,
                'hug_count'     => $hug,
                'support_count' => $support,
                'created_at'    => $time,
                'updated_at'    => $time,
            ]);
        }
    }
}
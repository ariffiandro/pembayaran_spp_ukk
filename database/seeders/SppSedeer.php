<?php

namespace Database\Seeders;

use App\Models\Admin\MAsterData\Spp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SppSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'tahun' => '2022',
                'nominal' => 350000
            ],
            [
                'tahun' => '2023',
                'nominal' => 370000
            ]
        ];

        foreach ($data as $item) {
            Spp::create($item);
        }
    }
}

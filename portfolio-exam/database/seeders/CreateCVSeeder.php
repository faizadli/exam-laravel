<?php

namespace Database\Seeders;

use App\Models\CV;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateCVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CV::create([
            'filename' => 'faizadli.pdf'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Type::create([
            'type' => 'Avatar'
            ]);
        Type::create([
            'type' => 'Mundo'
            ]);
        Type::create([
            'type' => 'Artefacto'
            ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workers')->insert([
            'name' => 'Gustavo Delgado Alves Gonçalves',
            'cpf' => '17670855754',
            'register' => '11882',
            'admission_date' => now(),
            'email' => 'admin@admin',
            'telephone' => '24981197269',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

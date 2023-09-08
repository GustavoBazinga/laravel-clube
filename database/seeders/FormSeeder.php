<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forms')->insert([
//            'name' => 'solicitacao',
            'title' => 'Formulário de Solcitações',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('forms')->insert([
//            'name' => 'reclamacao',
            'title' => 'Formulário de Reclamações',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

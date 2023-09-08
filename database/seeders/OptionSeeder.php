<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('options')->insert([
            'question_id' => 7,
            'option' => 'Livre',
            'next_question_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 1,
            'option' => 'Livre',
            'next_question_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        DB::table('options')->insert([
            'question_id' => 2,
            'option' => 'Solicitação de manutenção elétrica',
            'next_question_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 2,
            'option' => 'Solicitação de manutenção hidráulica',
            'next_question_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 2,
            'option' => 'Solicitação de TI',
            'next_question_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 2,
            'option' => 'Solicitação de limpeza',
            'next_question_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Sede',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'PET',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Quadra',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Padel',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Saúna',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Piscina',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Campo de Futebol',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Quadra de Tênis',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 3,
            'option' => 'Ginásio',
            'next_question_id' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 4,
            'option' => 'Livre',
            'next_question_id' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 5,
            'option' => 'Livre',
            'next_question_id' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('options')->insert([
            'question_id' => 6,
            'option' => 'Livre',
            'next_question_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}

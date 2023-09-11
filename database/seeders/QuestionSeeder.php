<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        DB::table('questions')->insert([
            'form_id' => 1,
            'question' => 'Qual o seu nome?',
            'type' => 'text',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //2
        DB::table('questions')->insert([
            'form_id' => 1,
            'question' => 'Qual sua solicitação?',
            'type' => 'select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //3
        DB::table('questions')->insert([
            'form_id' => 1,
            'question' => 'Qual o local da solicitação?',
            'type' => 'select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //4
        DB::table('questions')->insert([
            'form_id' => 1,
            'question' => 'Qual a data/hora para conclusão da solicitação?',
            'type' => 'date',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //5
        DB::table('questions')->insert([
            'form_id' => 1,
            'question' => 'Descreva sua solicitacao?',
            'type' => 'longtext',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //6
        DB::table('questions')->insert([
            'form_id' => 1,
            'question' => 'Qual seu telefone?',
            'type' => 'telephone',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //7
        DB::table('questions')->insert([
            'form_id' => 2,
            'question' => 'Qual a sua reclamacao?',
            'type' => 'longtext',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

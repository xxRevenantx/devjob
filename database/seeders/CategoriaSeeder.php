<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Backend Developer',
            'Frontend Developer',
            'Fullstack Developer',
            'DevOps',
            'DBA',
            'UX/UI Designer',
            'Product Manager',
            'Scrum Master',
            'Project Manager',
            'QA Tester',
            'Data Scientist',
            'Data Analyst',
            'Business Analyst',
            'Sales Manager',
            'Marketing Manager',
        ];

        foreach ($categorias as $categoria) {
             Categoria::create([
                'categoria' => $categoria,
            ]);
        }
    }
}

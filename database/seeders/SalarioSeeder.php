<?php

namespace Database\Seeders;

use App\Models\Salario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salarios = [
            [
                'salario' => '$0 - $499',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$500 - $749',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$750 - $999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$1000 - $1499',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$1500 - $1999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$2000 - $2499',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$2500 - $2999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '$3000 - $4999',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'salario' => '+$5000',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];


        foreach ($salarios as $salario) {
               Salario::create($salario);
        }





    }
}

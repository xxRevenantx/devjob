<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
            [
            'name' => 'Carlos Nuñez',
            'email' => 'carlos@admin.com',
            'rol' => 2, // 1 = Desarrollador, 2 = Reclutador
            'password' => bcrypt('12345678'),
            ]
        );

        User::factory()->create(
            [
            'name' => 'Oscar Nuñez',
            'email' => 'oscar@admin.com',
            'rol' => 1, // 1 = Desarrollador, 2 = Reclutador
            'password' => bcrypt('12345678'),
            ]
        );

        $this->call([
            SalarioSeeder::class,
            CategoriaSeeder::class,
        ]);
    }
}

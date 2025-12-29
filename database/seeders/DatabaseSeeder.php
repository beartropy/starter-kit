<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Beartropy',
            'email' => 'beartropy@beartropy.com',
            'password' => bcrypt('beartropy'),
        ]);

        $bearNames = [
            ['name' => 'Paddington Bear', 'email' => 'marmalade@example.com'],
            ['name' => 'Winnie the Pooh', 'email' => 'honey_lover@example.com'],
            ['name' => 'Yogi Bear', 'email' => 'picnic_basket@example.com'],
            ['name' => 'Baloo', 'email' => 'bare_necessities@example.com'],
            ['name' => 'Fozzie Bear', 'email' => 'wocka_wocka@example.com'],
            ['name' => 'Kung Fu Panda', 'email' => 'dragon_warrior@example.com'],
            ['name' => 'Smokey Bear', 'email' => 'prevent_fires@example.com'],
            ['name' => 'Ted', 'email' => 'thunder_buddy@example.com'],
            ['name' => 'Care Bear', 'email' => 'stare@example.com'],
        ];

        foreach ($bearNames as $bear) {
            User::factory()->create([
                'name' => $bear['name'],
                'email' => $bear['email'],
                'password' => bcrypt('password'), // Simple password for seeded users
            ]);
        }
    }
}

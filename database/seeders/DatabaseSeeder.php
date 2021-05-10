<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Contact;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->count(15)
                        ->has(Contact::factory()->count(15), 'contacts')
                        ->create();
        
        
    }
}

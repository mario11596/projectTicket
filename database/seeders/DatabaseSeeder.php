<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Contact;
use App\Models\User;
use App\Models\Category;
use App\Models\Ticket;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
       User::factory(30)->create();

        Contact::factory(400)->create(); 

        Category::create([
            'id' => 1, 'name' => 'Pritužba'
        ]);
        Category::create([
            'id' => 2, 'name' => 'Prijedlog'
        ]);
        Category::create([
            'id' => 3, 'name' => 'Žalba'
        ]);

        Ticket::factory()->count(2)->create([
            'status' => 'Otvoreno']
        );
    }
}

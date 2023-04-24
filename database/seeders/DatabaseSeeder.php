<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(5)->create();
        
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location'=> 'Boston, MA',
        //     'email'=>'email1@email.com',
        //     'website'=> 'lol@haha.com',
        //     'description'=>'Lorem ipsum dolor sit amet,
        //     consectetur adipiscing elit. Duis sodales at nisl quis aliquam. Cras interdum placerat mattis.
        //      Nam dapibus ac purus non gravida. Nulla non sollicitudin enim, sit amet fermentum odio. Nulla tempor massa a viverra fringilla.
        //       Sed malesuada a erat quis convallis. Pellentesque pretium nisl velit, rhoncus congue arcu aliquet eget. Aenean et metus a nulla consectetur pretium id vitae quam.
        //       Sed ut luctus turpis, vitae tempus eros.'
        // ]);
        // Listing::create([
        //     'title' => 'Laravel Junior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Shbab Orcawya',
        //     'location'=> 'Boston, MA',
        //     'email'=>'Orca@email.com',
        //     'website'=> 'lol@haha.com',
        //     'description'=>'Lorem ipsum dolor sit amet,
        //     consectetur adipiscing elit. Duis sodales at nisl quis aliquam. Cras interdum placerat mattis.
        //      Nam dapibus ac purus non gravida. Nulla non sollicitudin enim, sit amet fermentum odio. Nulla tempor massa a viverra fringilla.
        //       Sed malesuada a erat quis convallis. Pellentesque pretium nisl velit, rhoncus congue arcu aliquet eget. Aenean et metus a nulla consectetur pretium id vitae quam.
        //       Sed ut luctus turpis, vitae tempus eros.'
        // ]);

        Listing::factory(6)->create();
    }
}

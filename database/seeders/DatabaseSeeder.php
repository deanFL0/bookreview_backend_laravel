<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
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
        User::factory(10)->create();

        User::factory()->create([
            'email'=>'admin@example.com',
            'name'=>'admin',
            'password'=>'123',
            'is_admin'=>true,
        ]);

        Book::factory(20)->create()->each(function ($book){
            Review::factory(rand(2,10))->create([
                'book_id'=>$book->id,
                'user_id'=>User::inRandomOrder()->first()->id,
            ]);
        });
    }
}

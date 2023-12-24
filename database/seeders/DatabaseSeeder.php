<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\author;
use App\Models\Category;
use App\Models\publisher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ] = 
       
        
        $data = Role::create([
            'name' => 'admin'
         ]);

         $data1 = Role::create([
            'name' => 'user'
         ]);

         $user1 = User::create([
            'username' => 'admin',
            'password' => bcrypt('linlaz11'),
            'phone' => '08770207798',
            'address' => 'Kediri',
            'status' => 'active',
            'role_id' => '1'
        ]);

        $user2 = User::create([
            'username' => 'damara',
            'password' => '$2y$10$SiHsGBBSYaCTZ4irndWgKupFpyYIyRUBwqOwtZxJRu77n.QHK5rRS',
            'phone' => '08770207798',
            'address' => 'Kediri',
            'status' => 'active',
            'role_id' => '2'
        ]);

        $author1 = author::create([
            'name' => 'Raditya dika',
            'slug' => 'raditya-dika'

        ]);

        $author2 = author::create([
            'name' => 'Fikri Pratma',
            'slug' => 'fikri-pratama'

        ]);

        $author3 = author::create([
            'name' => 'Aldy vahera',
            'slug' => 'aldy-vahera'

        ]);

        $author4 = author::create([
            'name' => 'Alprih Sani',
            'slug' => 'alprih-sani'

        ]);

         
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $category1 = Category::create([
            'name' => 'Horor',
            'slug' =>'horor'
        ]);

        $category2 = Category::create([
            'name' => 'Sience',
            'slug' =>'sience'
        ]);

        $category3 = Category::create([
            'name' => 'Technology',
            'slug' =>'technology'
        ]);

        $category4 = Category::create([
            'name' => 'Novel',
            'slug' => 'novel'
        ]);

      $publish1 = publisher::create([
        'name' => 'Sinar dunia',
        'slug' => 'sinar-dunia'
      ]);

      $publish2 = publisher::create([
        'name' => 'Gramedia',
        'slug' => 'gramedia'
      ]);

      $publish3 = publisher::create([
        'name' => 'Gameloft',
        'slug' => 'gameloft'
      ]);

      }
}
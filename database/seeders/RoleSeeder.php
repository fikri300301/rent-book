<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Schema::disableForeignKeyConstraints();
         Role::truncate();
         Schema::enableForeignKeyConstraints();

         $data = Role::create([
            'name' => 'admin'
         ]);

         $data1 = Role::create([
            'name' => 'client'
         ]);
    }
}
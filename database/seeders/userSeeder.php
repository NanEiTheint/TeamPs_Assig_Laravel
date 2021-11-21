<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        // 	"name"=>"Admin",
        // 	"email"=>"admin@gmail.com",
        // 	"password"=>Hash::make('12345678')
        // ]);

        $roles=['admin','staff'];
        foreach ($roles as $value) {
        	Role::create(["name"=>$value]);
        }
    }
}

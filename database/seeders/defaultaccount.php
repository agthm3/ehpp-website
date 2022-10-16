<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class defaultaccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
            'name'=> 'admin',
            'email' => 'gigam57@gmail.com',
            'email_verified_at' => date('Y-m-d H:i:s', time()),
            'password' => \bcrypt('ROMAWI123'), 
            'roles'=> 'ADMIN'
        ]);
    }
}

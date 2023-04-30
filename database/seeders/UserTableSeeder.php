<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    protected $user = [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => '12345678'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->user['password'] = Hash::make($this->user['password']);

        User::create($this->user);
    }
}

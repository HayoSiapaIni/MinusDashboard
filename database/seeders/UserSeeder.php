<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            'nama_lengkap' => 'Tester',
            'email' => 'tester1@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '0',
            ],
            [
            'nama_lengkap' => 'Tester2',
            'email' => 'tester2@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '0',
            ],
            [
            'nama_lengkap' => 'Tester3',
            'email' => 'tester3@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '0',
            ],
            [
            'nama_lengkap' => 'Tester4',
            'email' => 'tester4@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '0',
            ],
            [    
            'nama_lengkap' => 'Tester5',
            'email' => 'tester5@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '0',
            ],
            [
            'nama_lengkap' => 'Tester6',
            'email' => 'tester6@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '1',
            ],
            [
            'nama_lengkap' => 'Tester7',
            'email' => 'tester7@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '1',
            ],
            [
            'nama_lengkap' => 'Tester8',
            'email' => 'tester8@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '1',
            ],
            [
            'nama_lengkap' => 'Tester9',
            'email' => 'tester9@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '1',
            ],
            [
            'nama_lengkap' => 'Tester10',
            'email' => 'tester10@gmail.com',
            'password' => Hash::make('abcd1234'),
            'no_hp' => Str::random(13),
            'is_seller' => '0',
            ]
        ]);
    }
}

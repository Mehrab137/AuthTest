<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'name' => 'Jurgen Klopp',
            'email' => 'jurgen@gmail.com',
            'password' => bcrypt('12345678'),
            'job_title' => 'salesman',
        ];

        Admin::create($admin);
    }
}

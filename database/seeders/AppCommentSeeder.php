<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AppComment;

class AppCommentSeeder extends Seeder {

    /**
     * Run the database seeds.
     */
    public function run(): void {
        AppComment::factory(20)->create();
    }
}

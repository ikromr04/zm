<?php

namespace Database\Seeders;

use App\Models\GroupSort;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    GroupSort::create([
      'sort' => json_encode([1,2]),
    ]);

    $this->call([
      UsersSeeder::class,
      TagsGroupSeeder::class,
      TagsSeeder::class,
      QuotesSeeder::class,
      PostsSeeder::class,
    ]);
  }
}

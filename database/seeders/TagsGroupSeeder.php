<?php

namespace Database\Seeders;

use App\Models\TagsGroup;
use Illuminate\Database\Seeder;

class TagsGroupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $groups = [
      'Мораль и Этика',
      'Предельные вопросы о мире',
    ];

    foreach ($groups as $group) {
      TagsGroup::create([
        'title' => $group,
      ]);
    }
  }
}

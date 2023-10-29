<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $posts = array(
      array('id' => '1', 'title' => 'Природа', 'slug' => 'priroda-1', 'image' => 'images/posts/photo-1.jpg', 'thumb_image' => 'images/posts/thumbs/photo-1.jpg', 'alternative_text' => 'Река', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '2', 'title' => 'Искусство', 'slug' => 'iskusstvo-2', 'image' => 'images/posts/photo-2.jpg', 'thumb_image' => 'images/posts/thumbs/photo-2.jpg', 'alternative_text' => 'Кисточки', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '3', 'title' => 'Душевный покой', 'slug' => 'dushevnyy-pokoy-3', 'image' => 'images/posts/photo-3.jpg', 'thumb_image' => 'images/posts/thumbs/photo-3.jpg', 'alternative_text' => 'Камни стоят друг на друге с идеальным балансом', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '4', 'title' => 'Дружба', 'slug' => 'druzhba-4', 'image' => 'images/posts/photo-4.jpg', 'thumb_image' => 'images/posts/thumbs/photo-4.jpg', 'alternative_text' => 'Два ребенка держатся за руки', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '5', 'title' => 'Душевный покой', 'slug' => 'dushevnyy-pokoy-5', 'image' => 'images/posts/photo-5.jpg', 'thumb_image' => 'images/posts/thumbs/photo-5.jpg', 'alternative_text' => 'Камни стоят друг на друге с идеальным балансом', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '6', 'title' => 'Промышленность', 'slug' => 'promyshlennost-6', 'image' => 'images/posts/photo-6.jpg', 'thumb_image' => 'images/posts/thumbs/photo-6.jpg', 'alternative_text' => 'Городок по среди гор', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '7', 'title' => 'Чистота', 'slug' => 'chistota-7', 'image' => 'images/posts/photo-7.jpg', 'thumb_image' => 'images/posts/thumbs/photo-7.jpg', 'alternative_text' => 'Капля воды на листе', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '8', 'title' => 'Чтение книг', 'slug' => 'rastenie-8', 'image' => 'images/posts/rastenie-8.png', 'thumb_image' => 'images/posts/rastenie-8.png', 'alternative_text' => 'Чтение книг', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-16 14:05:14'),
      array('id' => '9', 'title' => 'Космос', 'slug' => 'kosmos-9', 'image' => 'images/posts/photo-9.jpg', 'thumb_image' => 'images/posts/thumbs/photo-9.jpg', 'alternative_text' => 'Космос', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '10', 'title' => 'Мир', 'slug' => 'mir-10', 'image' => 'images/posts/photo-10.jpg', 'thumb_image' => 'images/posts/thumbs/photo-10.jpg', 'alternative_text' => 'Голубь летает', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59')
    );

    foreach ($posts as $post) {
      Post::create([
        'id' => $post['id'],
        'title' => $post['title'],
        'slug' => $post['slug'],
        'image' => $post['image'],
        'thumb_image' => $post['thumb_image'],
        'alternative_text' => $post['alternative_text'],
        'created_at' => $post['created_at'],
        'updated_at' => $post['updated_at'],
      ]);
    }
  }
}

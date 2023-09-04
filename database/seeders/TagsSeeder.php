<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tags = array(
      array('id' => '2', 'group_id' => NULL, 'title' => 'Мировоззрение', 'slug' => 'mirovozzrenie', 'created_at' => '2023-05-27 09:32:10', 'updated_at' => '2023-05-27 09:32:10'),
      array('id' => '3', 'group_id' => NULL, 'title' => 'Жизнелюбие', 'slug' => 'zhiznelyubie', 'created_at' => '2023-05-27 09:32:14', 'updated_at' => '2023-05-27 09:32:14'),
      array('id' => '4', 'group_id' => NULL, 'title' => 'Развитие личности', 'slug' => 'razvitie-lichnosti', 'created_at' => '2023-05-27 09:32:17', 'updated_at' => '2023-05-27 09:32:17'),
      array('id' => '5', 'group_id' => NULL, 'title' => 'Ценность жизни', 'slug' => 'cennost-zhizni', 'created_at' => '2023-05-27 09:32:20', 'updated_at' => '2023-05-27 09:32:20'),
      array('id' => '7', 'group_id' => NULL, 'title' => 'Цели человека', 'slug' => 'celi-cheloveka', 'created_at' => '2023-05-27 09:32:27', 'updated_at' => '2023-05-27 09:32:27'),
      array('id' => '8', 'group_id' => 1, 'title' => 'Человечность', 'slug' => 'chelovechnost', 'created_at' => '2023-05-27 09:32:30', 'updated_at' => '2023-05-27 09:32:30'),
      array('id' => '9', 'group_id' => NULL, 'title' => 'Наука и Просвещение', 'slug' => 'nauka-i-prosveshchenie', 'created_at' => '2023-05-27 09:32:34', 'updated_at' => '2023-05-27 09:32:34'),
      array('id' => '10', 'group_id' => NULL, 'title' => 'Развитие общества', 'slug' => 'razvitie-obshchestva', 'created_at' => '2023-05-27 09:32:38', 'updated_at' => '2023-05-27 09:32:38'),
      array('id' => '11', 'group_id' => NULL, 'title' => 'Направления мысли', 'slug' => 'napravleniya-mysli', 'created_at' => '2023-05-27 09:32:42', 'updated_at' => '2023-05-27 09:32:42'),
      array('id' => '12', 'group_id' => NULL, 'title' => 'Смысл жизни', 'slug' => 'smysl-zhizni', 'created_at' => '2023-05-27 09:32:45', 'updated_at' => '2023-05-27 09:32:45'),
      array('id' => '13', 'group_id' => NULL, 'title' => 'Самореализация', 'slug' => 'samorealizaciya', 'created_at' => '2023-05-27 09:32:48', 'updated_at' => '2023-05-27 09:32:48'),
      array('id' => '14', 'group_id' => NULL, 'title' => 'Свобода', 'slug' => 'svoboda', 'created_at' => '2023-05-27 09:32:51', 'updated_at' => '2023-05-27 09:32:51'),
      array('id' => '15', 'group_id' => 1, 'title' => 'Счастье', 'slug' => 'schaste', 'created_at' => '2023-05-27 09:32:54', 'updated_at' => '2023-05-27 09:32:54'),
      array('id' => '16', 'group_id' => NULL, 'title' => 'Ценности и Идеалы', 'slug' => 'cennosti-i-idealy', 'created_at' => '2023-05-27 09:32:57', 'updated_at' => '2023-05-27 09:32:57'),
      array('id' => '17', 'group_id' => NULL, 'title' => 'Жизненная позиция', 'slug' => 'zhiznennaya-poziciya', 'created_at' => '2023-05-27 09:33:00', 'updated_at' => '2023-05-27 09:33:00'),
      array('id' => '18', 'group_id' => NULL, 'title' => 'Юмор и Ирония', 'slug' => 'yumor-i-ironiya', 'created_at' => '2023-05-27 09:33:04', 'updated_at' => '2023-05-27 09:33:04'),
      array('id' => '19', 'group_id' => NULL, 'title' => 'Гуманизм', 'slug' => 'gumanizm', 'created_at' => '2023-07-04 06:57:10', 'updated_at' => '2023-07-04 06:57:10'),
      array('id' => '20', 'group_id' => NULL, 'title' => 'Духовность', 'slug' => 'duhovnost', 'created_at' => '2023-07-04 07:00:11', 'updated_at' => '2023-07-04 07:00:11'),
      array('id' => '22', 'group_id' => NULL, 'title' => 'Любовь', 'slug' => 'lyubov-sposobnost-lyubit', 'created_at' => '2023-07-04 07:18:26', 'updated_at' => '2023-08-31 05:03:35'),
      array('id' => '24', 'group_id' => NULL, 'title' => 'Начало бытия', 'slug' => 'nachalo-bytiya', 'created_at' => '2023-07-04 07:20:01', 'updated_at' => '2023-07-04 07:20:01'),
      array('id' => '25', 'group_id' => NULL, 'title' => 'Прекрасное', 'slug' => 'prekrasnoe', 'created_at' => '2023-07-10 07:23:54', 'updated_at' => '2023-07-10 07:23:54'),
      array('id' => '26', 'group_id' => NULL, 'title' => 'Профессионализм', 'slug' => 'professionalizm', 'created_at' => '2023-07-10 07:33:17', 'updated_at' => '2023-07-10 07:33:17'),
      array('id' => '27', 'group_id' => 2, 'title' => 'Бесцельность Вселенной', 'slug' => 'bescelnost-vselennoy', 'created_at' => '2023-08-25 07:10:44', 'updated_at' => '2023-08-25 07:10:44'),
      array('id' => '28', 'group_id' => NULL, 'title' => 'Благодарность', 'slug' => 'blagodarnost', 'created_at' => '2023-08-25 07:12:03', 'updated_at' => '2023-08-25 07:12:03'),
      array('id' => '29', 'group_id' => NULL, 'title' => 'Вера в человека', 'slug' => 'vera-v-cheloveka', 'created_at' => '2023-08-25 07:13:03', 'updated_at' => '2023-08-25 07:13:03'),
      array('id' => '30', 'group_id' => NULL, 'title' => 'Идеалы', 'slug' => 'idealy', 'created_at' => '2023-08-25 07:14:18', 'updated_at' => '2023-08-25 07:14:18'),
      array('id' => '31', 'group_id' => NULL, 'title' => 'Международные отношения', 'slug' => 'mezhdunarodnye-otnosheniya', 'created_at' => '2023-08-25 07:25:30', 'updated_at' => '2023-08-25 07:25:30'),
      array('id' => '32', 'group_id' => 2, 'title' => 'Происхождение человека', 'slug' => 'proishozhdenie-cheloveka', 'created_at' => '2023-08-25 07:30:14', 'updated_at' => '2023-08-25 07:30:14'),
      array('id' => '33', 'group_id' => NULL, 'title' => 'Познаваем ли мир', 'slug' => 'poznavaem-li-mir', 'created_at' => '2023-08-25 07:31:07', 'updated_at' => '2023-08-25 07:31:07'),
      array('id' => '34', 'group_id' => NULL, 'title' => 'Самоценность человека', 'slug' => 'samocennost-cheloveka', 'created_at' => '2023-08-25 09:09:39', 'updated_at' => '2023-08-25 09:09:39'),
      array('id' => '35', 'group_id' => NULL, 'title' => 'Природа человека', 'slug' => 'priroda-cheloveka', 'created_at' => '2023-08-25 09:24:41', 'updated_at' => '2023-08-25 09:24:41'),
      array('id' => '36', 'group_id' => NULL, 'title' => 'Призвание Homo sapiens', 'slug' => 'prizvanie-homo-sapiens', 'created_at' => '2023-08-25 09:26:09', 'updated_at' => '2023-08-25 09:26:09'),
      array('id' => '37', 'group_id' => NULL, 'title' => 'Вечные Ценности', 'slug' => 'vechnye-cennosti', 'created_at' => '2023-08-25 09:32:13', 'updated_at' => '2023-08-25 09:32:13'),
      array('id' => '38', 'group_id' => 2, 'title' => 'Загадки существования', 'slug' => 'zagadki-sushchestvovaniya', 'created_at' => '2023-08-31 05:24:37', 'updated_at' => '2023-08-31 05:24:37'),
      array('id' => '39', 'group_id' => NULL, 'title' => 'Возможность жить вечно', 'slug' => 'vozmozhnost-zhit-vechno', 'created_at' => '2023-08-31 05:25:05', 'updated_at' => '2023-08-31 05:25:05'),
      array('id' => '40', 'group_id' => 1, 'title' => 'Добро и Зло', 'slug' => 'dobro-i-zlo', 'created_at' => '2023-08-31 05:25:32', 'updated_at' => '2023-08-31 05:25:32'),
      array('id' => '41', 'group_id' => 2, 'title' => 'Бесконечность', 'slug' => 'beskonechnost', 'created_at' => '2023-08-31 05:25:58', 'updated_at' => '2023-08-31 05:25:58'),
      array('id' => '42', 'group_id' => 1, 'title' => 'Добродетели', 'slug' => 'dobrodeteli', 'created_at' => '2023-08-31 05:26:12', 'updated_at' => '2023-08-31 05:26:12'),
      array('id' => '43', 'group_id' => 1, 'title' => 'Нравственный долг', 'slug' => 'nravstvennyy-dolg', 'created_at' => '2023-08-31 05:26:49', 'updated_at' => '2023-08-31 05:26:49'),
      array('id' => '44', 'group_id' => 2, 'title' => 'История познания', 'slug' => 'istoriya-poznaniya', 'created_at' => '2023-08-31 05:27:16', 'updated_at' => '2023-08-31 05:27:16'),
      array('id' => '45', 'group_id' => 1, 'title' => 'Совесть', 'slug' => 'sovest', 'created_at' => '2023-08-31 05:27:42', 'updated_at' => '2023-08-31 05:27:42'),
      array('id' => '46', 'group_id' => NULL, 'title' => 'Ценность учений', 'slug' => 'cennost-ucheniy', 'created_at' => '2023-08-31 05:28:05', 'updated_at' => '2023-08-31 05:28:05'),
      array('id' => '47', 'group_id' => 1, 'title' => 'Этика', 'slug' => 'etika', 'created_at' => '2023-08-31 05:54:48', 'updated_at' => '2023-08-31 05:54:48'),
      array('id' => '48', 'group_id' => NULL, 'title' => 'Критическое мышление', 'slug' => 'kriticheskoe-myshlenie', 'created_at' => '2023-08-31 06:23:02', 'updated_at' => '2023-08-31 06:23:02'),
      array('id' => '49', 'group_id' => 2, 'title' => 'Материя', 'slug' => 'materiya', 'created_at' => '2023-08-31 06:50:15', 'updated_at' => '2023-08-31 06:50:15'),
      array('id' => '50', 'group_id' => NULL, 'title' => 'Просвещение', 'slug' => 'prosveshchenie', 'created_at' => '2023-08-31 06:55:41', 'updated_at' => '2023-08-31 06:55:41'),
      array('id' => '51', 'group_id' => 2, 'title' => 'Эволюция', 'slug' => 'evolyuciya', 'created_at' => '2023-08-31 07:00:31', 'updated_at' => '2023-08-31 07:00:31'),
      array('id' => '52', 'group_id' => 2, 'title' => 'Происхождение разума', 'slug' => 'proishozhdenie-razuma', 'created_at' => '2023-08-31 07:06:40', 'updated_at' => '2023-08-31 07:06:40')
    );

    foreach ($tags as $tag) {
      Tag::create([
        'id' => $tag['id'],
        'title' => $tag['title'],
        'group_id' => $tag['group_id'],
      ]);
    }
  }
}

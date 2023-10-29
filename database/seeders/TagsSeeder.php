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
      array('id' => '1', 'group_id' => null, 'title' => 'Этика и Жизненные ценности','slug' => 'moral-i-etika','created_at' => '2023-09-03 18:51:59','updated_at' => '2023-10-19 06:19:21'),
      array('id' => '2', 'group_id' => null, 'title' => 'Предельные вопросы о мире','slug' => 'predelnye-voprosy-o-mire','created_at' => '2023-09-03 18:51:59','updated_at' => '2023-09-03 18:51:59'),
      array('id' => '3', 'group_id' => null, 'title' => 'Современная личность','slug' => 'samorealizaciya','created_at' => '2023-09-13 08:09:42','updated_at' => '2023-09-15 05:18:08'),
      array('id' => '4', 'group_id' => null, 'title' => 'Просвещение','slug' => 'nauka-i-prosveshchenie','created_at' => '2023-09-13 08:09:54','updated_at' => '2023-09-19 10:09:54'),
      array('id' => '5', 'group_id' => null, 'title' => 'Общество','slug' => 'obshchestvo','created_at' => '2023-09-13 08:10:03','updated_at' => '2023-09-13 08:10:03'),

      array('id' => '2', 'title' => 'Мировоззрение', 'slug' => 'mirovozzrenie', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:15:01'),
      array('id' => '3', 'title' => 'Жизнелюбие', 'slug' => 'zhiznelyubie', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:14:13'),
      array('id' => '4', 'title' => 'Личностный рост', 'slug' => 'razvitie-lichnosti', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-16 04:49:15'),
      array('id' => '5', 'title' => 'Ценность жизни', 'slug' => 'cennost-zhizni', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:11:55'),
      array('id' => '7', 'title' => 'Человечество', 'slug' => 'celi-cheloveka', 'group_id' => '5', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-16 04:54:34'),
      array('id' => '8', 'title' => 'Человечность', 'slug' => 'chelovechnost', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '9', 'title' => 'Наука и Учения', 'slug' => 'nauka-i-prosveshchenie', 'group_id' => '4', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-19 04:39:09'),
      array('id' => '10', 'title' => 'Развитие общества', 'slug' => 'razvitie-obshchestva', 'group_id' => '5', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:17:01'),
      array('id' => '12', 'title' => 'Смысл жизни', 'slug' => 'smysl-zhizni', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:17:27'),
      array('id' => '13', 'title' => 'Самореализация', 'slug' => 'samorealizaciya', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:17:14'),
      array('id' => '14', 'title' => 'Свобода', 'slug' => 'svoboda', 'group_id' => '5', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:11:12'),
      array('id' => '15', 'title' => 'Счастье', 'slug' => 'schaste', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '16', 'title' => 'Жизненные ценности', 'slug' => 'cennosti-i-idealy', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-19 04:52:52'),
      array('id' => '17', 'title' => 'Жизненная позиция', 'slug' => 'zhiznennaya-poziciya', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:14:24'),
      array('id' => '18', 'title' => 'Юмор и Ирония', 'slug' => 'yumor-i-ironiya', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:33:47'),
      array('id' => '19', 'title' => 'Гуманизм', 'slug' => 'gumanizm', 'group_id' => '4', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:12:43'),
      array('id' => '20', 'title' => 'Духовность', 'slug' => 'duhovnost', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:13:57'),
      array('id' => '24', 'title' => 'Начало бытия', 'slug' => 'nachalo-bytiya', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:15:30'),
      array('id' => '25', 'title' => 'Прекрасное', 'slug' => 'prekrasnoe', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-19 04:43:58'),
      array('id' => '26', 'title' => 'Профессионализм', 'slug' => 'professionalizm', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:16:43'),
      array('id' => '28', 'title' => 'Благодарность', 'slug' => 'blagodarnost', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:13:21'),
      array('id' => '31', 'title' => 'Мир политики', 'slug' => 'mezhdunarodnye-otnosheniya', 'group_id' => '5', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-07 07:30:04'),
      array('id' => '33', 'title' => 'Познаваемость мира', 'slug' => 'poznavaem-li-mir', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-18 05:30:56'),
      array('id' => '34', 'title' => 'Самоценность человека', 'slug' => 'samocennost-cheloveka', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:10:55'),
      array('id' => '35', 'title' => 'Природа человека', 'slug' => 'priroda-cheloveka', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-19 10:12:59'),
      array('id' => '38', 'title' => 'Загадки существования', 'slug' => 'zagadki-sushchestvovaniya', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '40', 'title' => 'Добро и Зло', 'slug' => 'dobro-i-zlo', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '41', 'title' => 'Бесконечность', 'slug' => 'beskonechnost', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '42', 'title' => 'Добродетели', 'slug' => 'dobrodeteli', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '43', 'title' => 'Нравственный долг', 'slug' => 'nravstvennyy-dolg', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '44', 'title' => 'История познания', 'slug' => 'istoriya-poznaniya', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '45', 'title' => 'Совесть', 'slug' => 'sovest', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '47', 'title' => 'Этика', 'slug' => 'etika', 'group_id' => '1', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '48', 'title' => 'Критическое мышление', 'slug' => 'kriticheskoe-myshlenie', 'group_id' => '3', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:14:38'),
      array('id' => '49', 'title' => 'Самоорганизующаяся материя', 'slug' => 'materiya', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-10-12 08:32:59'),
      array('id' => '50', 'title' => 'Просвещение', 'slug' => 'prosveshchenie', 'group_id' => '4', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-13 08:21:24'),
      array('id' => '52', 'title' => 'Происхождение разума', 'slug' => 'proishozhdenie-razuma', 'group_id' => '2', 'created_at' => '2023-09-03 18:51:59', 'updated_at' => '2023-09-03 18:51:59'),
      array('id' => '54', 'title' => 'Ученные и мыслители', 'slug' => 'uchennye-i-mysliteli', 'group_id' => '4', 'created_at' => '2023-09-13 09:03:47', 'updated_at' => '2023-09-13 09:03:47'),
      array('id' => '55', 'title' => 'Убеждения', 'slug' => 'vera-i-ubezhdeniya', 'group_id' => '3', 'created_at' => '2023-09-15 06:18:32', 'updated_at' => '2023-10-07 07:31:08'),
      array('id' => '56', 'title' => 'Всеобщие идеалы', 'slug' => 'vseobshchie-idealy', 'group_id' => '5', 'created_at' => '2023-09-15 06:20:52', 'updated_at' => '2023-09-15 06:20:52'),
      array('id' => '57', 'title' => 'Полноценная жизнь', 'slug' => 'polnocennaya-zhizn', 'group_id' => '3', 'created_at' => '2023-09-15 06:24:39', 'updated_at' => '2023-09-15 06:24:39'),
      array('id' => '58', 'title' => 'Далёкое будущее', 'slug' => 'dalekoe-budushchee', 'group_id' => '4', 'created_at' => '2023-09-15 06:29:31', 'updated_at' => '2023-10-19 06:06:05'),
      array('id' => '59', 'title' => 'Искусственный интеллект', 'slug' => 'iskusstvennyy-intellekt', 'group_id' => '4', 'created_at' => '2023-09-15 06:29:47', 'updated_at' => '2023-09-15 06:29:47'),
      array('id' => '60', 'title' => 'Мудрость', 'slug' => 'mudrost', 'group_id' => '3', 'created_at' => '2023-09-15 06:30:15', 'updated_at' => '2023-09-15 06:30:15'),
      array('id' => '61', 'title' => 'Правильная жизнь', 'slug' => 'pravilnaya-zhizn', 'group_id' => '1', 'created_at' => '2023-09-15 06:30:38', 'updated_at' => '2023-09-15 06:30:38'),
      array('id' => '62', 'title' => 'Самоконтроль', 'slug' => 'samokontrol', 'group_id' => '3', 'created_at' => '2023-09-15 06:36:54', 'updated_at' => '2023-09-15 06:36:54'),
      array('id' => '63', 'title' => 'Современные проблемы', 'slug' => 'sovremennye-problemy', 'group_id' => '5', 'created_at' => '2023-09-15 06:40:47', 'updated_at' => '2023-09-15 06:40:47'),
      array('id' => '64', 'title' => 'Будущее Вселенной', 'slug' => 'budushchee-vselennoy', 'group_id' => '2', 'created_at' => '2023-09-15 09:50:18', 'updated_at' => '2023-09-15 09:50:18'),
      array('id' => '65', 'title' => 'Возможный мир', 'slug' => 'vozmozhnyy-mir', 'group_id' => '2', 'created_at' => '2023-09-15 09:52:03', 'updated_at' => '2023-09-15 09:52:03'),
      array('id' => '66', 'title' => 'Величие человека', 'slug' => 'velichie-cheloveka', 'group_id' => '4', 'created_at' => '2023-09-15 10:07:53', 'updated_at' => '2023-10-07 07:42:10'),
      array('id' => '67', 'title' => 'Время', 'slug' => 'vremya', 'group_id' => '2', 'created_at' => '2023-09-15 10:19:05', 'updated_at' => '2023-09-19 10:12:01'),
      array('id' => '68', 'title' => 'Мультивселенная', 'slug' => 'multivselennaya', 'group_id' => '2', 'created_at' => '2023-09-15 10:21:48', 'updated_at' => '2023-09-15 10:21:48'),
      array('id' => '69', 'title' => 'Ничто', 'slug' => 'nichto', 'group_id' => '2', 'created_at' => '2023-09-15 10:22:26', 'updated_at' => '2023-09-19 10:12:44'),
      array('id' => '70', 'title' => 'Самоуважение', 'slug' => 'samouvazhenie', 'group_id' => '3', 'created_at' => '2023-09-15 10:24:44', 'updated_at' => '2023-09-19 10:13:09'),
      array('id' => '71', 'title' => 'Математика', 'slug' => 'matematika', 'group_id' => '2', 'created_at' => '2023-09-15 10:56:57', 'updated_at' => '2023-09-19 10:12:29'),
      array('id' => '74', 'title' => 'Рациональность', 'slug' => 'racionalnost', 'group_id' => '3', 'created_at' => '2023-10-19 04:31:29', 'updated_at' => '2023-10-19 04:31:29')
    );

    foreach ($tags as $tag) {
      Tag::create([
        'title' => $tag['title'],
        'parent_id' => $tag['group_id'],
      ]);
    }
  }
}

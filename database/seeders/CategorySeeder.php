<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Cell Phones',
            'alias' => 'cellphones',
            'description' => 'Сегодня невозможно представить жизнь без смартфона – они нужны практически всем и для всего. Он поможет и сфотографировать интересный момент, и покажет дорогу до пункта назначения. С него можно далеко не только звонить – он открывает доступ к десяткам мессенджеров.',
            'image' => $this->faker->imageUrl(800, 400, 'cats', true, 'Faker'),
            'created_at' => '2022-07-17 13:42:22',
            'updated_at' => '2022-07-17 13:42:22'
        ]);

        Category::create([
            'name' => 'Laptops',
            'alias' => 'laptops',
            'description' => 'Лучшие ноутбуки мощные, но в основном портативные. Они могут работать со всем, на чем может работать настольный ПК, но также вы можете бросить их в сумку и отправиться куда-нибудь еще. В ноутбуках есть все необходимое, включая встроенный экран, клавиатуру, трекпад, хранилище и многое другое. Часто они дороже, чем их настольные эквиваленты, из-за дополнительного дизайна и соображений охлаждения.',
            'image' => $this->faker->imageUrl(800, 400, 'cats', true, 'Faker'),
            'created_at' => '2022-07-17 13:42:22',
            'updated_at' => '2022-07-17 13:42:22'
        ]);

        Category::create([
            'name' => 'TV',
            'alias' => 'tv',
            'description' => 'Телевизор – одно из самых важных приобретений, ведь перед ним человек проводит большую часть дня. На нем многие смотрят захватывающие фильмы или футбольные матчи, сериалы, а геймеры могут приспособить телевизор для многих игр, особенно если у телевизора высокая частота кадра.',
            'image' => $this->faker->imageUrl(800, 400, 'cats', true, 'Faker'),
            'created_at' => '2022-07-17 13:42:22',
            'updated_at' => '2022-07-17 13:42:22'
        ]);
    }
}

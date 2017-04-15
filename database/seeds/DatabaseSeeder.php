<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = \Faker\Factory::create('ru_RU');
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class, 'users_admin')->create();
        $users = factory(\App\Models\User::class, 'users', 100)->create();
        $tournaments = factory(\App\Models\Tournament::class, 63)->create();

        for ($u = 0; $u < count($users); $u++) {
            for ($t = 0; $t < count($tournaments); $t++) {
                if ((bool) random_int(0, 1)) {
                    $tournaments[$t]->likes()->create([
                        'user_id' => $this->faker->randomElement($users->toArray())['id'],
                        'vote' => random_int(0, 1),
                    ]);
                }
            }
        }
    }
}

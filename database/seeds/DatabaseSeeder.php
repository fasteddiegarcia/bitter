
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        factory(App\User::class, 50)->create()->each(function($user) {
            $user->posts()->save(factory(App\Post::class)->make());

            $post = App\Post::find(rand(1, App\Post::all()->count()));

            $user->userPosts()->attach($post);

        });
    }
}


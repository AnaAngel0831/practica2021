
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

  public function run()
{
  factory(App\User::class, 50)->create()->each(function($u) {
      $u->posts()->save(factory(App\Post::class)->make());
  });
}

}

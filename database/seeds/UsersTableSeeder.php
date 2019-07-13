<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'first_name' => 'Shuvo',
            'last_name' => 'Admin',
            'email' => 'shuvoahmedkhan202@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        $author = User::create([
            'first_name' => 'Kishor',
            'last_name' => 'Author',
            'email' => 'shuvoahmed@gmail.com',
            'password' => bcrypt('author'),
        ]);

        $user = User::create([
            'first_name' => 'Young',
            'last_name' => 'User',
            'email' => 'shuvobhai@gmail.com',
            'password' => bcrypt('user'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

        factory(App\User::class,50)->create();
    }
}

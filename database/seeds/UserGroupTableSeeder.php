<?php

use Illuminate\Database\Seeder;
use App\UserGroup;

class UserGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_groups')->delete();

        $user_id = DB::table('users')->select('id')
                                     ->where('email', 'admin@domain.com')
                                     ->first()
                                     ->id;

		$group_id = DB::table('groups')->select('id')
		                               ->where('name', 'Administrator')
		                               ->first()
		                               ->id;

        UserGroup::create(array(
	        'user_id' => $user_id,
	        'group_id' => $group_id
		));
    }
}

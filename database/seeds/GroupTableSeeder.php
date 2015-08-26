<?php

use Illuminate\Database\Seeder;
use App\Group;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();
        $now = date('Y-m-d H:i:s');

        Group::create(array(
    	        'id' => 1,
                'name' => 'Administrator',
    	        'permissions' => '{"admin":1,"user.list":1,"group.delete":1,"group.create.post":1,"group.assign":1,"group.assign.post":1,"group.create":1,"user.create.post":1,"user.delete":1,"user.create":1,"user.update.put":1,"user.update":1}',
    	        'created_at' => $now,
    			'updated_at' => $now));
    }
}

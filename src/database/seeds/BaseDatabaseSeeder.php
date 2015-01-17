<?php

use Illuminate\Database\Seeder;

class BaseDatabaseSeeder extends Seeder
{

    public function run()
    {
        // to use non eloquent-functions we need to unguard
        Eloquent::unguard();

        DB::table('users')->truncate();

        $user = new \User;
        $user->username = 'admin';
        $user->first_name = 'Admin';
        $user->last_name = 'User';
        $user->password = Hash::make('abc123');
        $user->save();

        DB::table('post_categories')->truncate();

        $cat = new \PostCategory;
        $cat->name = 'General';
        $cat->save();

        $cat = new \PostCategory;
        $cat->name = 'Tips and Tricks';
        $cat->save();

        $cat = new \PostCategory;
        $cat->name = 'Updates';
        $cat->save();

        DB::table('post_group_types')->truncate();

        $pgt = new \PostGroupType;
        $pgt->name = 'news';
        $pgt->save();

        $pgt = new \PostGroupType;
        $pgt->name = 'faq';
        $pgt->save();

        $pgt = new \PostGroupType;
        $pgt->name = 'event';
        $pgt->save();

        DB::table('post_groups')->truncate();

        $pg = new \PostGroup;
        $pg->name = 'News';
        $pg->post_group_type_id = 1;
        $pg->save();

        $pg = new \PostGroup;
        $pg->name = 'FAQ';
        $pg->post_group_type_id = 2;
        $pg->save();

        $pg = new \PostGroup;
        $pg->name = 'Event';
        $pg->post_group_type_id = 3;
        $pg->save();


        DB::table('product_categories')->truncate();
        DB::table('product_categories')->insert([
            ['name' => 'Bakery', 'created_at' => new DateTime],
            ['name' => 'Beverages', 'created_at' => new DateTime],
            ['name' => 'Chilled', 'created_at' => new DateTime],
            ['name' => 'Frozen Food', 'created_at' => new DateTime],
            ['name' => 'Fruits', 'created_at' => new DateTime],
            ['name' => 'Grocery', 'created_at' => new DateTime],
            ['name' => 'Household', 'created_at' => new DateTime],
            ['name' => 'Liquor', 'created_at' => new DateTime],
            ['name' => 'Meat', 'created_at' => new DateTime],
            ['name' => 'Fish', 'created_at' => new DateTime],
            ['name' => 'Vegetables', 'created_at' => new DateTime],
            ['name' => 'Homewear', 'created_at' => new DateTime],
        ]);
    }

}

<?php

use Illuminate\Database\Seeder;
use Fourtwenty\Cms\User as User;
use Fourtwenty\Cms\PostCategory as PostCategory;
use Fourtwenty\Cms\PostGroupType as PostGroupType;
use Fourtwenty\Cms\PostGroup as PostGroup;
use Fourtwenty\Cms\ProductCategory as ProductCategory;

class CmsDatabaseSeeder extends Seeder
{

    public function run()
    {

        // to use non eloquent-functions we need to unguard
        Eloquent::unguard();

        User::truncate();

        $user = new User;
        $user->username = 'admin';
        $user->first_name = 'Admin';
        $user->last_name = 'User';
        $user->password = Hash::make('abc123');
        $user->save();

        PostCategory::truncate();

        $cat = new PostCategory;
        $cat->name = 'General';
        $cat->save();

        $cat = new PostCategory;
        $cat->name = 'Tips and Tricks';
        $cat->save();

        $cat = new PostCategory;
        $cat->name = 'Updates';
        $cat->save();

        PostGroupType::truncate();

        $pgt = new PostGroupType;
        $pgt->name = 'news';
        $pgt->save();

        $pgt = new PostGroupType;
        $pgt->name = 'faq';
        $pgt->save();

        $pgt = new PostGroupType;
        $pgt->name = 'event';
        $pgt->save();

        PostGroup::truncate();

        $pg = new PostGroup;
        $pg->name = 'News';
        $pg->post_group_type_id = 1;
        $pg->save();

        $pg = new PostGroup;
        $pg->name = 'FAQ';
        $pg->post_group_type_id = 2;
        $pg->save();

        $pg = new PostGroup;
        $pg->name = 'Event';
        $pg->post_group_type_id = 3;
        $pg->save();

        $pcats = [
            ['name' => 'Bakery'],
            ['name' => 'Beverages'],
            ['name' => 'Chilled'],
            ['name' => 'Frozen Food'],
            ['name' => 'Fruits'],
            ['name' => 'Grocery'],
            ['name' => 'Household'],
            ['name' => 'Liquor'],
            ['name' => 'Meat'],
            ['name' => 'Fish'],
            ['name' => 'Vegetables'],
            ['name' => 'Homewear'],
        ];

        ProductCategory::truncate();
        foreach ($pcats as $pcat) {
            ProductCategory::create($pcat);
        }
    }

}

<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Seeder;
use Fourtwenty\Cms\User as User;
use Fourtwenty\Cms\PostCategory as PostCategory;
use Fourtwenty\Cms\PostGroupType as PostGroupType;

class CmsDatabaseSeeder extends Seeder
{

    public function run()
    {

        // to use non eloquent-functions we need to unguard
        \Eloquent::unguard();

        User::truncate();

        $user = new User;
        $user->username = 'admin';
        $user->first_name = 'Admin';
        $user->last_name = 'User';
        $user->password = \Hash::make('abc123');
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
    }

}

<?php

namespace Fourtwenty\Cms;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ProductMerchant extends \Eloquent
{

    use SoftDeletingTrait;

    protected $connection = 'fourtwenty.cms';
    protected $fillable = ['id'];
    protected $appends = [''];

}

<?php

namespace doctype_admin\Shop\Models;

use drh2so4\Thumbnail\Traits\thumbnail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use thumbnail;
    protected $guarded = [];
}

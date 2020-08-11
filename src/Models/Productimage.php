<?php

namespace doctype_admin\Shop\Models;

use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    use Thumbnail;

    protected $guarded = [];

    public function productimageable()
    {
        return $this->morphTo();
    }
}

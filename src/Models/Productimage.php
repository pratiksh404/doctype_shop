<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    protected $guarded = [];

    public function productimageable()
    {
        return $this->morphTo();
    }
}

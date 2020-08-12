<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Attrvalue extends Model
{
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}

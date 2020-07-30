<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}

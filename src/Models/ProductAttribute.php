<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }
}

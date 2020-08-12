<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }

    public function getInputTypeAttribute($attribute)
    {
        return [
            1 => "Drop Down",
            2 => "Radio",
            3 => "Text",
            4 => "Text Area"
        ][$attribute];
    }
}

<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use doctype_admin\Shop\Models\Attribute;

class Attrvalue extends Model
{
    protected $guarded = [];

    // Polymorphic Belongs To Attribute

    public function attrvalueable()
    {
        return $this->morphTo();
    }


    public function product_attributes_value()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_attrvalue')->withTimestamps();
    }
}

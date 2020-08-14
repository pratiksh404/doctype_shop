<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;

class Attrvalue extends Model
{
    protected $guarded = [];

    // Polymorphic Belongs To Attribute

    public function attrvalueable()
    {
        return $this->morphTo();
    }
}

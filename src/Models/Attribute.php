<?php

namespace doctype_admin\Shop\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attribute extends Model
{
    protected $guarded = [];

    public function values()
    {
        return $this->hasMany(ProductAttributeValue::class, 'product_attribute_id');
    }

    /* Accessor */
    public function getInputTypeAttribute($attribute)
    {
        return [
            1 => "Drop Down",
            2 => "Radio",
            3 => "Text",
            4 => "Text Area"
        ][$attribute];
    }

    /* Mutator : Conversion Product Attribute Name to Snake Case */
    public function setProductAttributeNameAttribute($value)
    {
        $this->attributes['product_attribute_name'] = Str::snake($value);
    }

    /* Accessor : Convert saved snake case to normal title word */
    public function getProductAttributeNameAttribute($value)
    {
        return title_case(str_replace('_', ' ', $value));
    }

    /* ------ Polymorphic Attribute Attrvalue Relation -------- */

    public function attrvalues()
    {
        return $this->morphMany(Attrvalue::class, 'attrvalueable');
    }

    /* ------------------------------------------------ */

    /*  public function products()
    {
        return $this->morphedByMany(Product::class, 'attributeable');
    } */

    /* Many to Many Product Attribute Relation */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'attribute_product')->withTimestamps();
    }

    public function product_attributes_value()
    {
        return $this->belongsToMany(Attrvalue::class, 'attribute_attrvalue')->withTimestamps();
    }
}

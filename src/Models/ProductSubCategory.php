<?php

namespace doctype_admin\Shop\Models;

use drh2so4\Thumbnail\Traits\thumbnail;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use thumbnail;
    protected $guarded = [];

    public function Category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}

<?php

namespace doctype_admin\Shop\Models;

use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductSubCategory extends Model
{
    use Thumbnail;
    use Sluggable;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'sub_category_slug' => [
                'source' => 'sub_category_name'
            ]
        ];
    }
}

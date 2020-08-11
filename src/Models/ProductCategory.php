<?php

namespace doctype_admin\Shop\Models;

use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProductCategory extends Model
{
    use Thumbnail;
    use Sluggable;

    protected $guarded = [];

    public function subCategories()
    {
        return $this->hasMany(ProductSubCategory::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'category_slug' => [
                'source' => 'category_name'
            ]
        ];
    }
}

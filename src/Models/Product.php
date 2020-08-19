<?php

namespace doctype_admin\Shop\Models;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use drh2so4\Thumbnail\Traits\Thumbnail;

class Product extends Model
{
    use Thumbnail;
    use Sluggable;
    use Taggable;

    protected $guarded = [];

    /**
     *
     * Cast json attribute product_meta_keywords as arrau
     *
     */

    protected $casts = [
        'product_meta_keywords' => 'array'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'product_slug' => [
                'source' => 'product_name'
            ]
        ];
    }

    /* ------ Polymorphic Product Image Relation -------- */

    public function images()
    {
        return $this->morphMany(Productimage::class, 'productimageable');
    }

    /* ------------------------------------------------ */

    public function attributes()
    {
        return $this->morphToMany(Attribute::class, 'attributeable');
    }
}

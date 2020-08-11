<?php

namespace doctype_admin\Shop\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use drh2so4\Thumbnail\Traits\Thumbnail;

class Product extends Model
{
    use Thumbnail;
    use Sluggable;

    protected $guarded = [];

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
}

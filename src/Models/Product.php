<?php

namespace doctype_admin\Shop\Models;

use drh2so4\Thumbnail\Traits\thumbnail;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use thumbnail;
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

    public function image()
    {
        return $this->morphMany(Productimage::class, 'productimageable');
    }

    /* ------------------------------------------------ */
}

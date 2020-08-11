<?php

namespace doctype_admin\Shop\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use drh2so4\Thumbnail\Traits\Thumbnail;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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
            'brand_slug' => [
                'source' => 'brand_name'
            ]
        ];
    }
}

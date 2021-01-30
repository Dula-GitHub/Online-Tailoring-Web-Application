<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;

    protected $table = 'sub_categories';

    protected $fillable = [
        'name',
        'category_id',
        'tailor_cost',
        'amount_of_cloth',
        'length_for_cost',
        'margin_measurement',
        'image_url',
        'deleted_at'
    ];

    public function measurements() {
        return $this->belongsToMany('App\Measurement', 'sub_category_measurements');
    }

    public function materials() {
        return $this->belongsToMany('App\Material', 'materials_sub_category');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;

    protected $table = 'materials';

    protected $fillable = [
        'name',
        'unit_price',
        'inventory_level',
        'stock',
        'image_url',
        'deleted_at'
    ];

    public function sub_categories() {
        return $this->belongsToMany('App\SubCategory', 'materials_sub_category');
    }
}

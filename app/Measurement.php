<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $table = "measurements";

    protected $fillable = [
        'name',
        'label',
        'deleted_at'

    ];

    public function sub_categories() {
        return $this->belongsToMany('App\SubCategory', 'sub_category_measurements');
    }
}

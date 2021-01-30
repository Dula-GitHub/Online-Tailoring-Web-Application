<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'category_id',
        'sub_category_id',
        'material_id',
        'amount_of_cloth',
        'requested_date',
        'cost',
        'design_image',
        'measurements',
        
    ];


    protected $dates = [
        'requested_date'
    ];


    public function category() {
        return $this->belongsTo('App\Category');
    }


    public function subCategory() {
        return $this->belongsTo('App\SubCategory');
    }


    public function material() {
        return $this->belongsTo('App\Material');
    }


    public function user() {
        return $this->belongsTo('App\User');
    }

}

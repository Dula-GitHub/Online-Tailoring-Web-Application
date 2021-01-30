<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InventoryLevel extends Model
{
    protected $table = 'inventory_level';

    protected $fillable = [
        'item_name'
    ];
}

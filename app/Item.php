<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}

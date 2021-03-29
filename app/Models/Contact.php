<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    const PER_PAGE = 10;

    protected $guarded = [];

    public function city(){
        return $this->belongsTo(City::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    // trait
    use HasFactory;

    const PER_PAGE = 10;

    // protected $fillable = ['name', 'population'];
    protected $guarded = [];

}

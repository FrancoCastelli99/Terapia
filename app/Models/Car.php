<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable=['id','name','slug','price','anio','mileage','color','description'];

    public function images()
    {
        return $this->hasMany('App\Image', 'car_id');
    }
}

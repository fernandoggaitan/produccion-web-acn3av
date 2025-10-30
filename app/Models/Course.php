<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'price', 'is_visible', 'image'];

    public function price_format()
    {
        return '$' . number_format($this->price, 2, ',', '.');
    }

    //protected $table = 'cursitos';

}

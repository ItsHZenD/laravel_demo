<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
    ];

    public function getYearCreatedAtAttribute($value){
        return  $this->created_at->format('d-m-Y');
    }
}

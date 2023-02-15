<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'level',
        'email',
        'password',
        'phone',
        'address',
        'gender',
        'birthdate'
    ];

    public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create())->y;
    }
    public function getGenderNameAttribute(){
        return ($this->gender === 1) ? 'Male' : 'Female';
    }
    public function getYearCreatedAtAttribute($value){
        return  $this->created_at->format('d-m-Y');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getGenderNameAttribute(){
        return($this->gender === 1) ? 'Male' : 'Female';
    }

    public function getAgeAttribute(){
        return date_diff(date_create($this->birthdate), date_create())->y;
    }
}

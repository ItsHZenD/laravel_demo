<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{   
    use Notifiable;
    use HasFactory;
    use SoftDeletes;
    public $timestamps = true;

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
        return ($this->gender === 1) ? 'Nam' : 'Nữ';
    }
    public function getYearCreatedAtAttribute($value){
        return  $this->created_at->format('d-m-Y');
    }

    public function role(){
        return $this->belongsTo('App\Role');
    }
}

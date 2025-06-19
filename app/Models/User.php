<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class User extends Model
{
    protected $table = 'users';
    protected $guarded = [];
    protected $fillable = [
        'name', 
        'phone',
    ];
    public $timestamps = false;
    
    public function pets()
    {
        return $this->hasMany(Pet::class, 'user_id', 'id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id', 'id');
    }
    
}

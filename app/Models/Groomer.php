<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groomer extends Model
{
    protected $table = 'groomers';
    protected $fillable = [
        'name', 'last_name', 'phone', 'specialization'
    ];
    public $timestamps = false;
    protected $guarded = [];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'groomer_id', 'id');
    }
    
}

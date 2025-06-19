<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $fillable = [
        'date', 'status', 'notes', 'user_id', 'groomer_id', 'pet_id'
    ];
    public $timestamps = false;
    protected $guarded = [];

  
    protected $casts = [
        'date' => 'date', 
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function groomer()
{
    return $this->belongsTo(Groomer::class);
}

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}

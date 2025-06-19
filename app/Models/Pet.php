<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pets';
    protected $guarded = [];
    protected $fillable = [
        'pname',
        'type', 
        'breed',
        'age'
    ];
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}

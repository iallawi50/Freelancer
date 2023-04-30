<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['stars', 'worker_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function worker(){
        return $this->belongsTo(User::class, 'worker_id');
    }
}

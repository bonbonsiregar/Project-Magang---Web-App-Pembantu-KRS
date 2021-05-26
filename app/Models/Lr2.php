<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lr2 extends Model
{
    use HasFactory;

    protected $table = 'lr2';

    public function user(){
        return $this->belongsTo(User::class);
    }
}

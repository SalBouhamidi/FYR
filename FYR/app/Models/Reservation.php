<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'id',
        'started',
        'ended',
        'propretie_id',
        'user_id'

    ];
}

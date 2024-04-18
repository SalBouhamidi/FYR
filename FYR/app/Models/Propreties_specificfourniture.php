<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propreties_specificfourniture extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable =[
        'id',
        'propretie_id',
        'specificfourniture_id'
    ];
}

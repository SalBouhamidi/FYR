<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propretie_specificfourniture extends Model
{
    use HasFactory;

    protected $table="propretie_specificfourniture";
    public $timestamps = false;

    protected $fillable=[
        'id',
        'propretie_id',
        'specificfourniture_id'
    ];
}

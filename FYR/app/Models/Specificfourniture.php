<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propretie;

class specificfourniture extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name'
    ];

    public function Propreties()
    {
        return $this->belongsToMany(Propretie::class, 'reservation');
    }

}

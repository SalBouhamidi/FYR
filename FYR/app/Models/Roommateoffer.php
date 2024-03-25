<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citie;
use App\Models\User;
use App\Models\Housingtype;



class Roommateoffer extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'address',
        'roomtype',
        'budget',
        'numberofroommates',
        'petperson',
        'smoker',
        'gender',
        'user_id',
        'citie_id',
        'housingtype_id'
    ];

    
    public function Housingtype(): BelongsTo
    {
        return $this->belongsTo(Housingtype::class);
    }

    
    public function Citie(): BelongsTo
    {
        return $this->belongsTo(Citie::class);
    }

    
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}

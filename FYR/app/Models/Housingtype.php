<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Roommateoffer;
use App\Models\Propretie;


class Housingtype extends Model
{
    use HasFactory;

    protected $fillable=[
        'id',
        'name',
    ];

    public function Roommateoffers(): HasMany
    {
        return $this->hasMany(Roommateoffer::class);
    }
    public function Propretie(): HasMany
    {
        return $this->hasMany(Propretie::class);
    }
}

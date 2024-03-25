<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roommateoffer;


class Citie extends Model
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
}

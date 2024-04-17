<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citie;
use App\Models\Image;
use App\Models\User;
use App\Models\Specificfourniture;

class Propretie extends Model
{
    use HasFactory;

    public function Citie(): BelongsTo
    {
        return $this->belongsTo(Citie::class);
    }

    public function Images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function Users()
    {
        return $this->belongsToMany(User::class, 'reservation');
    }

    public function Specificfournitures()
    {
        return $this->belongsToMany(Specificfourniture::class, 'reservation');
    }






}


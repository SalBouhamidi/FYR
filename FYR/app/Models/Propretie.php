<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\Citie;
use App\Models\Image;
use App\Models\User;
use App\Models\Housingtype;
use App\Models\Specificfourniture;
use Illuminate\Database\Eloquent\SoftDeletes;


class Propretie extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=[
        'id',
        'name',
        'description',
        'address',
        'price',
        'equipped',
        'surfacearea',
        'housingtype_id',
        'citie_id',
        'isactive',
        'user_id'
    ];

    public function Citie(): BelongsTo
    {
        return $this->belongsTo(Citie::class);
    }
    public function Housingtype(): BelongsTo
    {
        return $this->belongsTo(Housingtype::class);
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
        return $this->belongsToMany(Specificfourniture::class);
    }






}



<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Propretie;

class Image extends Model
{
    use HasFactory;

    public function Propretie(): BelongsTo
    {
        return $this->belongsTo(Propretie::class);
    }
}

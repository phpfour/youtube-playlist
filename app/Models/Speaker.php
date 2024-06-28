<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Speaker extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'fb_url',
        'x_url',
        'website_url',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}

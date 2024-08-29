<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_content',
        'en_content',
        'photo',
        'pdf',
    ];

    public function perviousWorks(): HasMany
    {
        return $this->hasMany(PreviousWork::class);
    }

}

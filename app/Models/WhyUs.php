<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_title',
        'ar_title',
        'en_content',
        'ar_content',
    ];
}

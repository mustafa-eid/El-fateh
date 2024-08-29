<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    
    protected $table='about_us';
    protected $fillable = [
        'en_company_name',
        'ar_company_name',
        'en_about_text',
        'ar_about_text',
        'founded_date',
        'email',
        'logo'
    ];
}

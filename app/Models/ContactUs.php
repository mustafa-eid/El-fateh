<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;

    protected $table='contact_us';


    protected $fillable = [
        // 'phone_number',
        'en_address',
        'ar_address',
        'email',
        'en_terms_conditions',
        'ar_terms_conditions',
    ];


    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class, 'contactUs_id');
    }
}

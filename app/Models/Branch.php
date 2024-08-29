<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'en_name',
        'ar_name',
        'email',
        'en_address',
        'ar_address',
        'latitude',
        'longitude',
    ];
    public function phoneNumbers()
    {
        return $this->hasMany(PhoneNumber::class, 'branch_id');
    }
}

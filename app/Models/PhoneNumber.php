<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'title', 'phone_number'];


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

}

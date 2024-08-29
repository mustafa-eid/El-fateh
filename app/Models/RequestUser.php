<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestUser extends Model
{
    use HasFactory;
    protected $table ='requests';
    protected $fillable = [
        'name',
        'phone_number',
        'city',
        'request_type_id',
        'request_service_id',
        'description',
    ];

    public function requestType()
{
    return $this->belongsTo(RequestType::class);
}

public function requestService()
{
    return $this->belongsTo(RequestService::class);
}
}

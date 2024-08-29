<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreviousWork extends Model
{
    use HasFactory;
    protected $table = "previous_works";
    protected $fillable = [
        'images',
        'en_engineer_name',
        'en_title',
        'ar_engineer_name',
        'ar_title',
        'started_at',
        'ended_at',
        'en_description',
        'ar_description',
        'en_location',
        'ar_location',
        'en_client',
        'ar_client',
        'total_area',
        'total_units',
        'total_concrete',
        'category_id',
        'pdf'
    ];

    public function category(): BelongsTo
{
    return $this->belongsTo(Category::class, 'category_id');
}

}

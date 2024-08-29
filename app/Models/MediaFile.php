<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    use HasFactory;
    protected $table = 'media_files';
    protected $fillable = ['home_video', 'article_sliders', 'about_video','qr_photo'];

}

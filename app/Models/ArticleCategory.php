<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $table = 'article_categories';

    protected $fillable = [
        'ar_name',
        'en_name',
        'ar_content',
        'en_content',
        'photo',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'article_category_id');
    }
}

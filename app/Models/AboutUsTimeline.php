<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUsTimeline extends Model
{
    use HasTranslations;

    protected $fillable = ['year', 'title', 'text', 'sort_order'];
    public $translatable = ['title', 'text'];
}

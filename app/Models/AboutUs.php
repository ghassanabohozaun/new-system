<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model
{
    use HasTranslations;

    protected $table = 'about_us';

    protected $fillable = ['vision_title', 'vision_description', 'vision_list', 'vision_image', 'mission_title', 'mission_description', 'mission_image', 'stat_1_value', 'stat_1_label', 'stat_2_value', 'stat_2_label', 'why_us_title', 'why_us_description', 'why_us_image', 'feature_1_title', 'feature_1_description', 'feature_1_icon', 'feature_2_title', 'feature_2_description', 'feature_2_icon'];

    public array $translatable = ['vision_title', 'vision_description', 'vision_list', 'mission_title', 'mission_description', 'stat_1_label', 'stat_2_label', 'why_us_title', 'why_us_description', 'feature_1_title', 'feature_1_description', 'feature_2_title', 'feature_2_description'];

    protected $casts = [
        'vision_list' => 'array',
    ];
}

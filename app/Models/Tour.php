<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Tour extends Model
{
    use SoftDeletes, HasTranslations, HasFactory;
    protected $table = 'tours';
    protected $fillable = ['id', 'name', 'title', 'details', 'price', 'country_id', 'city_id', 'tour_guide_name', 'photo', 'status'];

    public array $translatable = ['name', 'title', 'details', 'tour_guide_name'];

    // relations
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    //scopes
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }
    // accessories
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }
}

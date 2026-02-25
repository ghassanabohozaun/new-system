<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Flight extends Model
{
    use SoftDeletes, HasTranslations , HasFactory;
    protected $table = 'flights';
    protected $fillable = ['name', 'slug', 'details', 'status', 'days_num', 'nights_num', 'views', 'country_id', 'city_id', 'category_id', 'offer_duration_from', 'offer_duration_to'];
    public array $translatable = ['name', 'slug', 'details'];

    // relations
    //country
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    // city
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    // category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // flight services
    public function flightServices()
    {
        return $this->hasMany(FlightService::class, 'flight_id');
    }

    // flight prices
    public function flightPrices()
    {
        return $this->hasMany(FlightPrice::class, 'flight_id');
    }

    // flight images
    public function images()
    {
        return $this->hasMany(FlightImage::class, 'flight_id');
    }

  // flight notes
    public function flightNotes()
    {
        return $this->hasMany(FlightNote::class, 'flight_id');
    }

     // flight including
    public function flightIncludings()
    {
        return $this->hasMany(FlightIncluding::class, 'flight_id');
    }

     // flight not including
    public function flightNotIncludings()
    {
        return $this->hasMany(FlightNotIncluding::class, 'flight_id');
    }

    // reservations
    public function reservations(){
        return $this->hasMany(Reservation::class ,'flight_id' );
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

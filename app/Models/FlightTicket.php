<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FlightTicket extends Model
{
    use SoftDeletes, HasTranslations , HasFactory;
    protected $table = 'flight_tickets';
    protected $fillable = ['id', 'title', 'details', 'price', 'from_country_id', 'from_city_id', 'to_country_id', 'to_city_id', 'status', 'photo'];

    public array $translatable = ['title', 'details'];

    // relations
    public function formCountry()
    {
        return $this->belongsTo(Country::class, 'from_country_id');
    }

    public function toCountry()
    {
        return $this->belongsTo(Country::class, 'to_country_id');
    }

    public function formCity()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }

    // reservation
    public function reservation()  {
        return $this->hasOne(Reservation::class);
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

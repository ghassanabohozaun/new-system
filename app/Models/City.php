<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'cities';
    protected $fillable = ['name', 'country_id'];
    public $timestamps = false;
    public array $translatable = ['name'];

    // relations
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    // flights
    public function flights()
    {
        return $this->hasMany(Flight::class, 'city_id');
    }

    // tours
    public function tours()
    {
        return $this->hasMany(Tour::class, 'city_id');
    }

    // fromFlightTicket
    public function fromFlightTicket()
    {
        return $this->hasMany(FlightTicket::class, 'from_city_id');
    }

    // toFlightTicket
    public function toFlightTicket()
    {
        return $this->hasMany(FlightTicket::class, 'to_city_id');
    }
}

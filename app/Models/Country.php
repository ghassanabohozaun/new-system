<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'countries';
    protected $fillable = ['name', 'phone_code', 'flag_code', 'status'];

    // public $timestamps = true;

    public array $translatable = ['name'];

    // relation
    // cities
    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

    // fromFlightTicket
    public function fromFlightTicket()
    {
        return $this->hasMany(FlightTicket::class, 'from_country_id');
    }

    // toFlightTicket
    public function toFlightTicket()
    {
        return $this->hasMany(FlightTicket::class, 'to_country_id');
    }

    // tours
    public function tours()
    {
        return $this->hasMany(Tour::class, 'country_id');
    }

    // fights
    public function flights()
    {
        return $this->hasMany(Flight::class, 'country_id');
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

    // // accessories
    // public function getStatusAttribute($status)
    // {
    //     return $status == 1 ? 'on' : '';
    // }
}

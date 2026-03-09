<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\Attributes\Ticket;
use App\Traits\QueryTrait;
use Astrotomic\Translatable\Translatable;

class Reservation extends Model
{
    use HasFactory, QueryTrait;
    protected $table = 'reservations';
    protected $fillable = ['flight_id', 'service', 'client_name', 'client_mobile', 'client_email',
    'client_passport_number', 'number_of_adult', 'number_of_children', 'number_of_babies', 'nationality', 'depature_country_id',
    'depature_date', 'return_date', 'ticket_id', 'from_country_id', 'from_city_id', 'to_country_id', 'to_city_id', 'economy_class_name',
    'economy_class_type', 'notes'];


    protected $hidden  = ['deleted_at','updated_at'];

    // functions

    public function reservationService()
    {
        if ($this->service == 'flight') {
            return __('reservations.flight');
        } elseif ($this->service == 'tour') {
            return __('reservations.tour');
        } elseif ($this->service == 'ticket') {
            return __('reservations.ticket');
        }
    }

    public function reservationEconomyClassType()
    {
        if ($this->economy_class_type == 'direct_flight') {
            return __('reservations.direct_flight');
        } elseif ($this->economy_class_type == 'transit') {
            return __('reservations.transit');
        }
    }
    // relations
    // flight
    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }

    // ticket
    public function ticket()
    {
        return $this->belongsTo(FlightTicket::class, 'ticket_id');
    }

    // depature country
    public function depatureCountry()
    {
        return $this->belongsTo(Country::class, 'depature_country_id');
    }

    // to country
    public function toCountry()
    {
        return $this->belongsTo(Country::class, 'to_country_id');
    }

    // from country
    public function fromCountry()
    {
        return $this->belongsTo(Country::class, 'from_country_id');
    }

    // to city
    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }

    // from city
    public function fromCity()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    //scopes
    // public function scopeSearch($query, $search_word)
    // {
    //     return $query->where(function ($q) use ($search_word) {
    //         $q->where('client_name', 'like', "%{$search_word}%")
    //           ->orWhere('client_mobile', 'like', "%{$search_word}%")
    //           ->orWhere('client_email', 'like', "%{$search_word}%")
    //           ->orWhere('client_passport_number', 'like', "%{$search_word}%")
    //           ->orWhere('nationality', 'like', "%{$search_word}%")
    //           ->orWhereHas('flight', function($q) use ($search_word) {
    //               $q->where('name', 'like', "%{$search_word}%");
    //           });
    //     });
    // }

    // accessories
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }
}

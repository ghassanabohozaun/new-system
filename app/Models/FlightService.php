<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FlightService extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'flight_services';
    protected $fillable = ['name', 'flight_id'];

    // translatable
    public array $translatable = ['name'];

    // relations
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

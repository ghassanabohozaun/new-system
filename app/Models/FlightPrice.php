<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FlightPrice extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'flight_prices';
    protected $fillable = ['text', 'price', 'main_option', 'flight_id'];

    // translatable
    public array $translatable = ['text'];

    // relations
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

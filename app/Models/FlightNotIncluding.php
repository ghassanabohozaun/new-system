<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FlightNotIncluding extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'flight_not_includings';
    protected $fillable = ['text', 'flight_id'];

    // translatable
    public array $translatable = ['text'];

    // relations
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class FlightIncluding extends Model
{
    use SoftDeletes, HasTranslations;
    protected $table = 'flight_includings';
    protected $fillable = ['text', 'flight_id'];

    // translatable
    public array $translatable = ['text'];

    // relations
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

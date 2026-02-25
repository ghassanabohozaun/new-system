<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FlightImage extends Model
{
    use SoftDeletes;
    protected $table = 'flight_images';
    protected $fillable = ['file_name', 'file_size', 'file_type', 'flight_id'];

    // relations
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}

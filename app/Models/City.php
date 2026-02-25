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

    // relation
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

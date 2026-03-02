<?php

namespace App\Models;

use App\Traits\QueryTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use SoftDeletes, HasTranslations, QueryTrait;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'status', 'parent', 'icon'];

    // translation
    public array $translatable = ['name', 'slug'];

    // relations
    public function flights()
    {
        return $this->hasMany(Flight::class, 'category_id');
    }

    public function parentRelation()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent');
    }

    // scopes
    public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }
    public function scopeInactive($query)
    {
        return $query->whereStatus(0);
    }

    // accessories
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y h:i A');
    }
}

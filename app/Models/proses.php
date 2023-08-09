<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proses extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'proses';

    public function category()
    {
        // return $this->belongsToMany(Category::class, 'proses_layanan');
        return $this->belongsTo(Category::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
    public function scopeSteps($query,  $step)
    {

        $query->when($step ?? false, function ($query, $steps) {
            return $query->where('name', 'like', '%' . $steps . '%');
        });
    }
}

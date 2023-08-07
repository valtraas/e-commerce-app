<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];
    protected $table = 'category';
    use HasFactory;
    use Sluggable;

    public function portofolio()
    {
        return $this->hasMany(PortofolioModel::class);
    }

    public function proses()
    {
        // return $this->belongsToMany(proses::class, 'proses_layanan');
        return $this->hasMany(proses::class);
    }

    public function fitur()
    {
        // return $this->belongsToMany(fitur::class, 'fitur_layanan');
        return $this->hasMany(fitur::class);
    }



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function scopeLayanan($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }
}

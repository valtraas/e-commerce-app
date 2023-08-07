<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortofolioModel extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'portofolio';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getRouteKeyName()
    {

        return 'judul';
    }

    public function scopeFilter($query, $filter)
    {
        //  $query->when($filters['search'] ?? false, function ($query, $search) {
        //     return $query->where('name', 'like', '%' . $search . '%');
        // });
        $query->when($filter ?? false, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        });
    }
}

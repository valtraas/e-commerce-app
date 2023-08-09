<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fitur extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'fitur';

    public function category()
    {
        // return $this->belongsToMany(Category::class, 'fitur_layanan');
        return $this->belongsTo(Category::class);
    }

    public function scopeFound($query, $fitur)
    {
        $query->when($fitur ?? false, function ($query, $fitur) {
            return $query->where('name', 'like', '%' . $fitur . '%');
        });
    }
}

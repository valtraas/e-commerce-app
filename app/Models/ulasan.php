<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'ulasan';

    public function kontak()
    {
        return $this->belongsTo(kontak::class);
    }

    public function scopeComment($query, $comment)
    {
        // $comments = Ulasan::with('kontak')->whereHas('kontak', function ($query) use ($search) {
        //     $query->where('name', 'like', '%' . $search . '%');
        // })->latest()->get();
        $query->when($comment ?? false, function ($query, $comment) {
            return $query->whereHas('kontak', function ($query) use ($comment) {
                $query->where('name', 'like', '%' . $comment . '%');
            });
        });
    }
}

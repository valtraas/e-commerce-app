<?php

namespace App\Models;

use App\Mail\kontakMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class kontak extends Model
{
    use HasFactory, Notifiable;
    protected $guarded  = ['id'];
    protected $table = 'kontak';

    public static function boot()
    {

        parent::boot();

        static::created(function ($item) {

            $adminEmail = "pelangiwarnawarni630@gmail.com";
            Mail::to($adminEmail)->send(new kontakMail($item));
        });
    }

    public function ulasan()
    {
        return $this->hasMany(ulasan::class);
    }



    public function getRouteKeyName()
    {
        return 'name';
    }
    public function getFullNameAtribute()
    {
        return $this->name;
    }
    public function scopeClient($query, $search)
    {
        $query->when($search ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
    }
}

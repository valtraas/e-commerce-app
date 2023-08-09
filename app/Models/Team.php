<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'team';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function scopeTeam($query, $team)
    {
        $query->when($team ?? false, function ($query, $team) {
            return $query->where('name', 'like', '%' . $team . '%');
        });
    }
}

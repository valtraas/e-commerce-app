j<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class ProsesLayanan extends Model
    {
        use HasFactory;
        protected $guarded = ['id'];
        protected $table = 'proses_layanan';
    }

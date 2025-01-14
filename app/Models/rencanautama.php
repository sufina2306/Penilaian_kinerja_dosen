<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaUtama extends Model
{
    use HasFactory;

    protected $table = 'rencanautamas'; // Nama tabel

    protected $fillable = [
        'user_id',
        'akuntable',
        'kompeten',
        'harmonis',
        'loyal',
        'adaptif',
        'kolaboratif',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrilakuKinerja extends Model
{
    use HasFactory;

    protected $table = 'prilakukinerjas';

    protected $fillable = [
        'user_id',
        'pelayanan',
        'akuntable',
        'kompeten',
        'harmonis',
        'loyal',
        'adaptif',
        'kolaboratif',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

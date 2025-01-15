<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanRencana extends Model
{
    protected $table = 'pengajuan_rencanas';
    
    protected $fillable = [
        'rencanprilaku_id',
        'rencanautama_id',
        'user_id',
        'periode_id',
        'status',
        'tanggal_pengajuan'
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'periode_id');
    }
} 
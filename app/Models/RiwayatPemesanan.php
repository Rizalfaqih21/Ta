<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \Znck\Eloquent\Traits\BelongsToThrough;

class RiwayatPemesanan extends Model
{
    use SoftDeletes, HasFactory;
    
    public $table = 'riwayat_pemesanans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pemesanan_id',
        'teknisi_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Menunggu Teknisi'                => 'Menunggu Teknisi',
        'on process'                      => 'On process',
        'Selesai'                         => 'Selesai',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }

    public function teknisi()
    {
        return $this->belongsTo(Teknisi::class, 'teknisi_id');
    }

    public function users()
    {
        return $this->belongsToThrough(User::class, Pemesanan::class);
    }
}
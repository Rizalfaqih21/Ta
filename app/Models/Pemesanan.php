<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pemesanans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const STATUS_SELECT = [
        'Order Masuk' => 'Order Masuk',
        'Sudah Ambil' => 'Sudah Diambil',
        'Di Batalkan' => 'Di Tolak',
    ];

    protected $fillable = [
        'user_id',
        'layanan_id',
        'nama',
        'no_hp',
        'alamat',
        'nama_barang',
        'deskripsi',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot() 
    {
        parent::boot();
        self::observe(new \App\Observers\PemesananObserver);
    }

    public function pemesananRiwayatPemesanans()
    {
        return $this->hasMany(RiwayatPemesanan::class, 'pemesanan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
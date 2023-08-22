<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teknisi extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'teknisis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'layanan_id',
        'nama',
        'no',
        'alamat',
        'gambar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    public function getImage()
    {
        if (substr($this->gambar, 0, 5) == "https") {
            return $this->gambar;
        }

        if ($this->gambar) {
            return asset('/uploads/imgCover/' . $this->gambar);
        }

        return 'https://via.placeholder.com/500x500.png?text=No+Cover';
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
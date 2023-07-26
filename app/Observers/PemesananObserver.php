<?php

namespace App\Observers;

use App\Models\Pemesanan;
use App\Models\RiwayatPemesanan;
use App\Models\Teknisi;
use App\Models\User;

class PemesananObserver
{
    /**
     * Handle the Pemesanan "created" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function created(Pemesanan $pemesanan)
    {
        RiwayatPemesanan::create([
            'pemesanan_id' => $pemesanan->id,
            'teknisi_id' => Null,
            'status' => 'Menunggu Teknisi'
        ]);
    }

    /**
     * Handle the Pemesanan "updated" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function updated(Pemesanan $pemesanan)
    {
        if (auth()->user()->is_teknisi) {
            $teknisi = Teknisi::where('user_id', auth()->id())->first();
            $teknisi_id = $teknisi->id;
            if($pemesanan->isDirty('status')){
                RiwayatPemesanan::create([
                    'pemesanan_id' => $pemesanan->id,
                    'teknisi_id' => $teknisi_id,
                    'status' => 'on process'
                ]);
            }
        };
    }

    /**
     * Handle the Pemesanan "deleted" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function deleted(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Handle the Pemesanan "restored" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function restored(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Handle the Pemesanan "force deleted" event.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return void
     */
    public function forceDeleted(Pemesanan $pemesanan)
    {
        //
    }
}

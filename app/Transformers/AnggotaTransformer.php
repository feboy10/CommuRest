<?php

namespace App\Transformers;

use App\anggota;
use App\Transformers\PengajuanTransformer;
use League\Fractal\TransformerAbstract;

class AnggotaTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'pengajuans'
    ];

    public function transform(anggota $anggota)
    {
        return [
            'id'        => $anggota->id,
            'nama'      => $anggota->nama,
            'email'     => $anggota->email,
            'api_token' => $anggota->api_token,
            'komunitas' => $anggota->komunitas,
            'kampus'    => $anggota->kampus,
            'alamat'    => $anggota->alamatKampus,
            'deskripsi'  => $anggota->deskripsi,
            'registered'=> $anggota->created_at->diffForHumans(),
        ];
    }

    public function includePengajuan(anggota $anggota)
    {
        $pengajuan = $anggota->pengajuans()->latestFirst()->get();

        return $this->collection($pengajuan, new PengajuanTransformer);
    }
}
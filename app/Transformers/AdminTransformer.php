<?php

namespace App\Transformers;

use App\admin;
use League\Fractal\TransformerAbstract;

class AdminTransformer extends  TransformerAbstract
{
    public function transform(admin $admin)
    {
        return [
            'id'        => $admin->id,
            'nama'      => $admin->nama,
            'email'     => $admin->email,
            'api_token' => $admin->api_token,
            'registered'=> $admin->created_at->diffForHumans(),
        ];
    }
}
<?php

namespace App\Models;

class produk extends Model{
    protected $table = 'produk';

    function seller()
    {
        return $this->Belongsto(User::class, 'id_user');
    }
}
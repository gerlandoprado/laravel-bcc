<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $table = 'locacoes';

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}

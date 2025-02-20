<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Locacao extends Model
{
    use HasFactory;

    protected $table = 'locacoes';

    protected $fillable = [
        'carro_id',
        'cliente_id',
        'data_inicio',
        'data_fim',
        'valor_pago'
    ];

    protected $dates = [
        'data_inicio',
        'data_fim'
    ];

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
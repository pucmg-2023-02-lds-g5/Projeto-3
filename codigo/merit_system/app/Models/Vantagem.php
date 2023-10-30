<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vantagem extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'custo_em_moedas',
        'imagem',
        'empresa_id',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}

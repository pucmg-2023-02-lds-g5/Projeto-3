<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vantagem extends Model
{
    use HasFactory;

    protected $table = 'vantagens';

    protected $fillable = [
        'descricao',
        'custo_em_moedas',
        'imagem',
        'id_empresa',
        'nome',
    ];

    public function empresa()
{
    return $this->belongsTo(Empresa::class, 'id_empresa', 'id');
}


    public function alunos()
{
    return $this->belongsToMany(Aluno::class, 'aluno_vantagem');
}


}

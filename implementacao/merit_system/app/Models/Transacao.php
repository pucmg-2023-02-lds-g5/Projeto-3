<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes';

    protected $fillable = [
        'professor_id',
        'aluno_id',
        'quantidade',
        'mensagem'
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}


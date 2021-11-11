<?php

namespace App\Models\Security;

use App\Models\Secutiry\Operacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submodulo extends Model
{
    use HasFactory;

    protected $table = 'modulo';

    protected $fillable = ['modulo_id', 'nome', 'descricao', 'icone', 'menu', 'url', 'target', 'ordem'];

    public function operacoes()
    {
        return $this->hasMany(Operacao::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}

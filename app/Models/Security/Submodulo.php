<?php

namespace App\Models\Security;

use App\Models\Secutiry\Operacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submodulo extends Model
{
    use HasFactory;

    protected $table = 'submodulo';

    protected $fillable = ['modulo_id', 'nome', 'icone', 'menu', 'descricao', 'ordem'];

    public function operacoes()
    {
        return $this->hasMany(Operacao::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}

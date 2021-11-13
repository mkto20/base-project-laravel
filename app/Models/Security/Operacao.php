<?php

namespace App\Models\Security;

use App\Models\Security\Modulo;
use App\Models\Security\Perfil;
use App\Models\Security\Submodulo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $table = 'operacao';

    protected $fillable = ['submodulo_id', 'nome', 'nome_curto', 'descricao', 'url', 'icone', 'target'];

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'perfil_operacao');
    }

    public function submodulo()
    {
        return $this->belongsTo(Submodulo::class);
    }
}

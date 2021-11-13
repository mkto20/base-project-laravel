<?php

namespace App\Models\Security;

use App\Models\Security\Operacao;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = "perfil";

    protected $fillable = ['nome', 'identificador'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_perfil');
    }

    public function operacoes()
    {
        return $this->belongsToMany(Operacao::class, 'perfil_operacao');
    }
}

<?php

namespace App\Models\Security;

use App\Models\Secutiry\Operacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulo';

    protected $fillable = ['nome', 'icone', 'url', 'descricao'];

    public function submodulos()
    {
        return $this->hasMany(Submodulo::class);
    }
}

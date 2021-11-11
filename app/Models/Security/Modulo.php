<?php

namespace App\Models\Security;

use App\Models\Secutiry\Operacao;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $table = 'modulo';

    protected $fillable = ['nome', 'descrição', 'icone', 'url'];

    public function submodulos()
    {
        return $this->hasMany(Submodulo::class);
    }
}

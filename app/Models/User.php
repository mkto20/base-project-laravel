<?php

namespace App\Models;

use App\Models\Security\Modulo;
use App\Models\Security\Perfil;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Eloquence, Mappable;

    protected $fillable = [
        'cpf',
        'nome',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function operacoesBreadcumb()
    {
        $ops = array();
        foreach ($this->perfis as $perfil) {
            foreach ($perfil->operacoes as $operacao) {
                if (!in_array($operacao->url, array_column($ops, 'url'))) {
                    array_push($ops, $operacao);
                }
            }
        }
        return $ops;
    }

    public function allModules()
    {
        return Modulo::orderBy('nome', 'asc')->get();
    }

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'user_perfil');
    }
}

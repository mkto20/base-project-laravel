<?php

namespace App\Models;

use App\Models\Security\Modulo;
use App\Models\Security\Perfil;
use App\Models\Security\Submodulo;
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

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class, 'user_perfil');
    }

    public function myModules()
    {
        $modulesIDs = $this->mySubmodules()->pluck('id')->toArray();
        return Modulo::whereHas('submodulos', function ($query) use ($modulesIDs) {
            $query->whereIn('id', $modulesIDs);
        })->orderBy('nome', 'asc');
    }

    public function mySubmodules()
    {
        $submodulesIDs = $this->operacoesBreadcumb()->pluck('id')->toArray();
        return Submodulo::whereHas('operacoes', function ($query) use ($submodulesIDs) {
            $query->whereIn('id', $submodulesIDs);
        })->orderBy('nome', 'asc');
    }

    public function operacoesBreadcumb()
    {
        $opsArray = array();
        $ops = collect();
        foreach ($this->perfis as $perfil) {
            foreach ($perfil->operacoes as $operacao) {
                if (!in_array($operacao->url, array_column($opsArray, 'url'))) {
                    array_push($opsArray, $operacao);
                    $ops->add($operacao);
                }
            }
        }
        return $ops;
    }
}

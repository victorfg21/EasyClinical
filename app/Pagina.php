<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = 'paginas';

    protected $fillable = [
        'descricao'
    ];

    public function Perfis(){
        return $this->hasMany(\App\Perfil::class);
    }
}

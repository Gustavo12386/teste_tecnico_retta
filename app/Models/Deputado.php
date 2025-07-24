<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{

  use HasFactory;

    protected $fillable = [
        'deputado_id',
        'nome',
        'partido',
        'uf',
        'id_legislatura',
        'url_foto',
        'email'
    ];



 public function despesas(){
    return $this->hasMany(Despesa::class);
 }
}

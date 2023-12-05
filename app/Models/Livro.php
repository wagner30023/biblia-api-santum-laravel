<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Livro extends Model
{
    use HasFactory;

    protected $fillable =  ['posicao', 'nome', 'abreviacao', 'testamentos_id'];

    /*
        * Pega o testamento
    */

    public function testamento()
    {
        return $this->belongsTo(Testamento::class);
    }

    /*
        * Pega todos os versiculos vinculados
    */

    public function versiculos()
    {
        return $this->hasMany(Versiculo::class);
    }
}

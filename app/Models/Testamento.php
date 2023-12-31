<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testamento extends Model
{
    use HasFactory;

    // protected $table = 'testamentos';
    protected $fillable = ['nome'];

    /*
     * pegar todos os livros vinculados
     */

    public function livros()
    {
        return $this->belongsTo(Livro::class);
    }
}

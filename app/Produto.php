<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome_produto', 'preco_produto', 'foto_produto'];
    public $timestamps = false;

    public function getFotoUrlAttribute()
    {
        if ($this->foto_produto) {
            return Storage::url($this->foto_produto);
        }
        return Storage::url('/produto/sem-imagem.jpg');
    }
}

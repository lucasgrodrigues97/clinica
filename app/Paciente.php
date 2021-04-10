<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Paciente extends Model
{
    protected $table = 'pacientes';
    protected $fillable = ['nome', 'telefone', 'data_nascimento', 'foto', 'endereco'];
    public $timestamps = false;

    public function consultas()
    {
        return $this->hasMany(Consulta::class);
    }

    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return Storage::url($this->foto);
        }
        return Storage::url('/paciente/sem-imagem.jpg');
    }
}

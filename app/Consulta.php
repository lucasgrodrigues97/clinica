<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $fillable = ['nome_consulta', 'data_consulta', 'preco_consulta', 'dados_consulta' ,'paciente_id'];
    public $timestamps = false;


    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}

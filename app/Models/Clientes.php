<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'data_nasc', 'ativo', 'data_desativou', 'created_at', 'updated_at'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'document';
    
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }

    public function clientes()
    {
        return $this->belongsTo(Clientes::class, 'clientes_id');
    }
   
    public function user()
    {
        return $this->belongsTo(User::class, 'usuarios_id');
    }

    public function tipodocumento()
    {
        return $this->belongsTo(TipoDocumentos::class, 'tipo_documento_id');
    }


}

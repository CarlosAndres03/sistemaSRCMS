<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CumplimientoControl extends Model
{
    use HasFactory;
    protected $table = 'CumplimientoControlMinimo';
    protected $primaryKey = 'idCumplimiento';
    protected $fillable = ['idUsuario','statusCumplimiento', 'documentoEvidencia', 'observacionCumplimiento', 'atencionCumplimiento','semestre','anio'];
    public function controlMinimo()
    {
        return $this->belongsTo(ControlMinimo::class, 'idControlMinimo');
    }
}
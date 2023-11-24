<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlMinimo extends Model
{
    use HasFactory;
    protected $table = 'ControlMinimos';
    protected $primaryKey = 'idControlMinimo';
    protected $fillable = ['descripcionControlMinimo','statusCumplimiento', 'documentoEvidencia', 'observacionCumplimiento', 'atencionCumplimiento'];

    public function cumplimientoControlMinimo()
    {
        return $this->hasMany(CumplimientoControl::class, 'idControlMinimo');
    }
}

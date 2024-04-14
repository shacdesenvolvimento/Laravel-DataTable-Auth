<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresas_socio extends Model
{
    use HasFactory;
    protected $fillable=[
        'id_empresa',
        'id_socio'
    ];

    public function socio(){
        return $this->belongsTo(Socios::class,'id_socio');
    }
    
    
    public function empresa(){
        return $this->belongsTo(Empresas::class,'id_empresa');
    }
}

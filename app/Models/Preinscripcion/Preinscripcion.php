<?php

namespace App\Models\Preinscripcion;

use App\Http\Controllers\Catalogo\Oficina\SedePlaticaInformativaController;
use App\Models\Catalogo\Oficina\Oficina;
use App\Models\Catalogo\Oficina\SedeAplicacion;
use App\Models\Catalogo\Oficina\SedePlaticaInfomativa;
use App\Models\Inscripcion\Inscripcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Preinscripcion extends Model
{
    use SoftDeletes;

    const SOLTERO = 0, CASADO = 1, UNION_LIBRE = 2, VIUDO = 3, DIVORCIADO = 4;

    const MUJER = 1, HOMBRE = 2;

    protected $fillable = [
        "no_preinscripcion", "nombre", "apellido_paterno", "apellido_materno", "domicilio", "id_entidad",
        "id_municipio", "codigo_postal", "fecha_nacimiento", "estado_civil", "id_usuario", "id_sede", "id_fecha",
        "colonia", "telefono", "genero", "id_grupo"
    ];


    public function sede()
    {
        return $this->hasOne(SedePlaticaInfomativa::class, 'id', 'id_sede');
    }

    public function grupo()
    {
        return $this->hasOne(PlaticaInformativa::class,'id','id_grupo');
    }

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class,'id_preinscripcion','id');
    }

    public function platica()
    {
        return $this->belongsTo(PlaticaInformativa::class,'id','id_grupo');
    }



    public static function getEstadosCiviles()
    {
        return [
            Preinscripcion::SOLTERO => 'SOLTERO',
            Preinscripcion::CASADO => 'CASADO',
            Preinscripcion::UNION_LIBRE => 'UNIÓN LIBRE',
            Preinscripcion::VIUDO => 'VIUDO',
            Preinscripcion::DIVORCIADO => 'DIVORCIADO',
        ];
    }

    public static function getGeneros()
    {
        return [
            Preinscripcion::HOMBRE => 'Hombre',
            Preinscripcion::MUJER => 'Mujer'
        ];
    }


    protected $dates = ["deleted_at"];


    public function scopeApellidoPaterno($query, $apellidopaterno)
    {
        if ($apellidopaterno != "") {
            $query->where('apellido_paterno', "LIKE", $apellidopaterno);
        }
    }

    public function scopeApellidoMaterno($query, $apellidomaterno)
    {
        if ($apellidomaterno != "") {
            $query->where('apellido_materno', "LIKE", $apellidomaterno);
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('nombre', "LIKE", $nombre);
        }
    }

    public function scopeEntidad($query, $entidad)
    {
        if ($entidad != "") {
            $query->where('id_entidad', $entidad);
        }
    }

    public function scopeMunicipio($query, $municipio)
    {
        if ($municipio != "") {
            $query->where('id_municipio', $municipio);
        }
    }

    public function scopeTelefono($query, $telefono)
    {
        if ($telefono != "") {
            $query->where('telefono', $telefono);
        }
    }

    public function scopeDomicilio($query, $domicilio)
    {
        if ($domicilio != "") {
            $query->where('colonia', $domicilio);
        }
    }

    public function scopeColonia($query, $colonia)
    {
        if ($colonia != "") {
            $query->where('colonia', $colonia);
        }
    }

    public function scopeSede($query, $sede)
    {
        if ($sede != "") {
            $query->where('id_sede', $sede);
        }
    }

    public function scopeGrupo($query, $grupo)
    {
        if ($grupo != "") {
            $query->where('id_grupo', $grupo);
        }
    }

    public function scopePreinscripcion($query, $nopreinscripcion)
    {
        if ($nopreinscripcion != "") {
            $query->where('no_preinscripcion', $nopreinscripcion);
        }
    }

    public function scopeGenero($query, $genero)
    {
        if ($genero != "") {
            $query->where('genero', $genero);
        }
    }

    public function scopeReporteFechas($query,$fechainicio,$fechafinal)
    {
        if($fechainicio && $fechafinal != ""){
            $query->whereBetween('created_at',array($fechainicio,$fechafinal));
        }
    }

    public function scopeReporteNumero($query,$numeroinicio,$numerofinal)
    {
        if($numeroinicio && $numerofinal != "")
        {
            $query->whereBetween('created_at',array($numeroinicio,$numerofinal));
        }
    }


    public static function generateFolio($preinscripcion, $folio, $folioLength = 14)
    {
        $preFolio = date("Y") . $preinscripcion->sede->clave . $folio->folio;
        $length = strlen($preFolio);
        if ($length < $folioLength) {
            $preFolio = date("Y") . $preinscripcion->sede->clave;
            $zeroToAdd = ($folioLength - $length);
            for ($i = 0; $i < $zeroToAdd; $i++) {
                $preFolio .= "0";
            }
            $preFolio .= $folio->folio;
        }
        return $preFolio;
    }
}

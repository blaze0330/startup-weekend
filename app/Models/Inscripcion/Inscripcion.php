<?php

namespace App\Models\Inscripcion;

use App\Models\Catalogo\Area;
use App\Models\Catalogo\Entidad;
use App\Models\Catalogo\Municipio;
use App\Models\Catalogo\Oficina\CentroAsesoria;
use App\Models\Catalogo\Oficina\SedeAplicacion;
use App\Models\Catalogo\Semestre;
use App\Models\Preinscripcion\Preinscripcion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends Model
{
    use SoftDeletes;

    const TERCERO_SECUNDARIA = 1, PRIMER_SEMESTRE_BACHILLERATO = 2, SEGUNDO_SEMESTRE_BACHILLERATO = 3, TERCER_SEMESTRE_BACHILLERATO = 4, CUARTO_SEMESTRE_BACHILLERATO = 5, QUINTO_SEMESTRE_BACHILLERATO = 6, SEXTO_SEMESTRE_BACHILLERATO = 7;
    const GRUPO_A = 1, GRUPO_B = 2;
    const ESTATUS_FALTAN_ARCHIVOS = 0, ESTATUS_ACTIVO = 1;
    const MASCULINO = 1, FEMENINO = 2;
    const SOLTERO = 0, CASADO = 1, UNION_LIBRE = 2, VIUDO = 3, DIVORCIADO = 4;

//    const CIENCIAS_ADMINISTRATIVAS_Y_SOCIALES=1,CIENCIAS_FISICO_MATEMATICO=2,HUMANIDADES=3,NUPLES=4;

    protected $fillable =
        ["id_preinscripcion","id_semestre", "extranjero", "escuela_procedencia", "estudiante_discapacitado", "id_discapacidad", "id_usuario", "curp",
            "id_municipio_nacimiento", "id_entidad_nacimiento", "id_ultimoestudio", "id_area", "id_centroasesoria", "matricula",
            "nombre", "apellido_paterno", "apellido_materno", "domicilio", "id_entidad", "id_municipio", "codigo_postal", "fecha_nacimiento",
            "estado_civil", "id_sede", "colonia", "telefono", "genero", "id_grupo", "estatus"];

    protected $dates = ["deleted_at"];


    public static function getEstadosCiviles()
    {
        return [
            Inscripcion::SOLTERO => 'SOLTERO',
            Inscripcion::CASADO => 'CASADO',
            Inscripcion::UNION_LIBRE => 'UNIÓN LIBRE',
            Inscripcion::VIUDO => 'VIUDO',
            Inscripcion::DIVORCIADO => 'DIVORCIADO',
        ];
    }

    public static function getGeneros()
    {
        return [
            Inscripcion::MASCULINO => 'MASCULINO',
            Inscripcion::FEMENINO => 'FEMENINO'
        ];
    }

    public static function getUltimoEstudio()
    {
        return [
            Inscripcion::TERCERO_SECUNDARIA => 'Tercero de Secundaria',
            Inscripcion::PRIMER_SEMESTRE_BACHILLERATO => 'Primer Semestre de Bachillerato',
            Inscripcion::SEGUNDO_SEMESTRE_BACHILLERATO => 'Segundo Semestre de Bachillerato',
            Inscripcion::TERCER_SEMESTRE_BACHILLERATO => 'Tercer Semestre de Bachillerato',
            Inscripcion::CUARTO_SEMESTRE_BACHILLERATO => 'Cuarto Semestre de  Bachillerato',
            Inscripcion::QUINTO_SEMESTRE_BACHILLERATO => 'Quinto Semestre Bachillerato',
            Inscripcion::SEXTO_SEMESTRE_BACHILLERATO => 'Sexto Semestre Bachillerato',
        ];
    }


    public static function getGrupo()
    {
        return [
            Inscripcion::GRUPO_A => 'Grupo A',
            Inscripcion::GRUPO_B => 'Grupo B',
        ];

    }

    public static function getEstadosCivilesById(int $id)
    {
        $estadosciviles= self::getEstadosCiviles();
        return $estadosciviles[$id]?? 'No existe ese estado civil';
    }

    public static function getGeneroById(int $id){
        $generos=self::getGeneros();
        return $generos[$id]?? 'No existe ese genero';
    }

    public static function getUltimoEstudioById(int $id)
    {
        $ultimosestudios = self::getUltimoEstudio();
        return $ultimosestudios[$id] ?? 'No existe ese grado';
    }

    public static function getGruposById(int $id)
    {
        $grupos = self::getGrupo();
        return $grupos[$id] ?? 'No existe ese grupo';
    }


    public function preinscripcion()
    {
        return $this->hasOne(Preinscripcion::class, 'id', 'id_preinscripcion');
    }

    public function semestre()
    {
        return $this->hasOne(Semestre::class,'id','id_semestre');
    }

    public function sede()
    {
        return $this->hasOne(SedeAplicacion::class, 'id', 'id_sede');
    }

    public function entidad_nacimiento()
    {
        return $this->hasOne(Entidad::class, 'id', 'id_entidad_nacimiento');
    }

    public function entidad()
    {
        return $this->hasOne(Entidad::class, 'id', 'id_entidad');
    }

    public function municipio()
    {
        return $this->hasOne(Municipio::class, 'id', 'id_municipio');
    }

    public function municipio_nacimiento()
    {
        return $this->hasOne(Municipio::class, 'id', 'id_municipio_nacimiento');
    }

    public function centro_asesoria()
    {
        return $this->hasOne(CentroAsesoria::class, 'id', 'id_centroasesoria');
    }

    public function area()
    {
        return $this->hasOne(Area::class, 'id', 'id_area');
    }

    public function scopeMatricula($query, $matricula)
    {
        if ($matricula != "") {
            $query->where('matricula', $matricula);
        }
    }

    public function scopeNombre($query, $nombre)
    {
        if ($nombre != "") {
            $query->where('nombre', $nombre);
        }
    }

    public function scopeApellidoPaterno($query, $apellidopaterno)
    {
        if ($apellidopaterno != "") {
            $query->where('apellido_paterno', $apellidopaterno);
        }
    }

    public function scopeApellidoMaterno($query, $apellidomaterno)
    {
        if ($apellidomaterno != "") {
            $query->where('apellido_materno', $apellidomaterno);
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

    public function scopeDomicilio($query, $domicilio)
    {
        if ($domicilio != "") {
            $query->where('domicilio', $domicilio);
        }
    }

    public function scopeTelefono($query, $telefono)
    {
        if ($telefono != "") {
            $query->where('telefono', $telefono);
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

    public function scopeGenero($query, $genero)
    {
        if ($genero != "") {
            $query->where('genero', $genero);
        }
    }

    public static function generateFolio($inscripcion, $folio, $folioLength = 12)
    {
        $preFolio = substr(date("Y"), -2) . $inscripcion->sede->clave . $folio->folio;
        $length = strlen($preFolio);
        if ($length < $folioLength) {
            $preFolio = substr(date("Y"), -2) . $inscripcion->sede->clave;
            $zeroToAdd = ($folioLength - $length);
            for ($i = 0; $i < $zeroToAdd; $i++) {
                $preFolio .= "0";
            }
            $preFolio .= $folio->folio;
        }
        return $preFolio;
    }

}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $connection = 'rrhh';
    protected $table = 'acceso.usuarios';
    protected $primaryKey = 'idusuario';
    public $timestamps = false;

    public $unidadEstructura;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',

        'nombre',
        'uid',
        'correo',
        'clave',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'clave',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function __construct()
    // {
    //     parent::__construct(); // Llama al constructor de la clase padre

    //     // Llama al método cargoxunidad en el constructor
    //     $this->cargoxunidad();
    // }


    /**
     * Cargo por unidad
     * Retornar null si no se encuentra el empleado
     */

    public function cargoxunidad()

    // {
    //     // Obtén el usuario autenticado
    //     $usuario = Auth::user();

    //     // Obtén el ID del empleado a partir de la cédula del usuario

    //     $idEmpleado = DB::connection('rrhh')->table('rrhh.exp_expedientes')
    //         ->where('cedula', $usuario->cedula) // Suponiendo que 'cedula' es la columna que vincula usuarios y expedientes
    //         ->value('idempleado');

    //     if ($idEmpleado) {
    //         // Obtén el cargo por unidad del empleado
    //         $cargoPorUnidad = DB::connection('rrhh')->table('rrhh.exp_expedientexcargoxunidad')
    //             ->where('idstatus', 1)
    //             ->where('idempleado', $idEmpleado)
    //             ->first();

    //         return $cargoPorUnidad;
    //     }

    //     // en la vista se puede acceder asi {{ Auth::user()->cargoxunidad()->idempleado }} 

    //     return null; // Retornar null si no se encuentra el empleado
    // }

    {
        $usuario = Auth::user();

        $result = DB::connection('rrhh')->table('rrhh.exp_expedientes AS e')
            ->select('e.cedula', 'u.idusuario', 'e.idempleado', 'u.nombre', 'e.sexo', 
            'ecxu.idunidadestructura', 'eu.desunidadestructura', 
            'ecxu.idcargoxnivel', 'ec.idcargo', 'ec.descargoxnivel')
            ->join('acceso.usuarios AS u', 'u.cedula', '=', 'e.cedula')
            ->join('rrhh.exp_expedientexcargoxunidad AS ecxu', 'e.idempleado', '=', 'ecxu.idempleado')
            ->join('rrhh.emp_unidadestructura AS eu', 'eu.idunidadestructura', '=', 'ecxu.idunidadestructura')
            ->join('rrhh.emp_cargoxniveles AS ec', 'ec.idcargoxnivel', '=', 'ecxu.idcargoxnivel')
            ->where('u.idstatus', 1)
            ->where('ecxu.idstatus', 1)
            ->where('ec.idstatus', 1)
            ->where('u.idusuario', $usuario->idusuario) // Filtro por el ID de usuario autenticado
            ->first();

            $this->unidadEstructura = $result;

        return $result;
    }

    /**
     * Gerente de la gerencia de Tecnología
     * @return boolean
     */
    public function esGerente()
    {
        $gerencias = DB::connection('meru2')->table('public.gerencias')
            ->where('cod_ger', 3) /* GERENCIA DE TECNOLOGÍA E INFORMACIÓN */
            ->where('status', 1) /* ACTIVA */
            ->get();

        // return($gerencias) ;

        foreach ($gerencias as $gerencia) {
            // Compara el nombre del usuario con el nombre del jefe de la gerencia
            if (strpos($gerencia->nom_jefe, $this->nombre) !== false) {
                return true; // Si hay coincidencia, retorna true
            }
        }

        return false; // Si no hay coincidencia con ningún jefe de gerencia, retorna false
    }

    /**
     * Jefes de la gerencia de Tecnología
     * @return boolean
     */
    public function esJefe()
    {
        // dd( $this->unidadEstructura);
        // $idunidadestructura = $this->unidadEstructura->idunidadestructura;
        // $idcargo = $this->unidadEstructura->idcargo;
        // if ($idunidadestructura >= 901 && $idunidadestructura <= 907 && ($idcargo == 45 || $idcargo == 417 || $idcargo == 432 || $idcargo == 433 || $idcargo == 434 || $idcargo == 435)) {
        //     return true;
        // }

        // return false;

        $usuario = Auth::user();

        $result = DB::connection('rrhh')->table('rrhh.exp_expedientes AS e')
            ->select('e.cedula', 'u.idusuario', 'e.idempleado', 'u.nombre', 'e.sexo', 
            'ecxu.idunidadestructura', 'eu.desunidadestructura', 
            'ecxu.idcargoxnivel', 'ec.idcargo', 'ec.descargoxnivel')
            ->join('acceso.usuarios AS u', 'u.cedula', '=', 'e.cedula')
            ->join('rrhh.exp_expedientexcargoxunidad AS ecxu', 'e.idempleado', '=', 'ecxu.idempleado')
            ->join('rrhh.emp_unidadestructura AS eu', 'eu.idunidadestructura', '=', 'ecxu.idunidadestructura')
            ->join('rrhh.emp_cargoxniveles AS ec', 'ec.idcargoxnivel', '=', 'ecxu.idcargoxnivel')
            ->where('u.idstatus', 1)
            ->where('ecxu.idstatus', 1)
            ->where('ec.idstatus', 1)
            ->where('u.idusuario', $usuario->idusuario) // Filtro por el ID de usuario autenticado
            ->first();

            if ( $result->idunidadestructura  >= 901 && $result->idunidadestructura <= 907 && ( $result->idcargo == 45 || $result->idcargo == 417 || $result->idcargo == 432 || $result->idcargo == 433 || $result->idcargo == 434 || $result->idcargo == 435) ) {
                return $result;
            }

            return false;
            

            // $this->unidadEstructura = $result;

        // return $result;

    }

    /**
     * Analistas de la gerencia de Tecnología
     * @return boolean
     */
    public function esAnalista()
    {
        return true;
        $analistas = DB::connection('rrhh')->table('rrhh.vis_exp_datos_empleado')
            ->whereBetween('idunidadestructura', [901, 907])
            ->whereNotIn('idcargo', [20, 45, 417, 432, 433, 434, 435])
            ->orderBy('idcargo')

            // ->pluck('nombre', 'idusuario');
            ->get();

        //  dump($analistas) ;

        foreach ($analistas as $analista) {
            if ($this->uid === $analista->uid) {
                return true;
            }
        }

        return false;
    }

    /**
     * Pasantes de la gerencia de Tecnología
     * @return boolean
     */
    public function esPasante()
    {
        return false;
        $pasantes = DB::connection('rrhh')->table('rrhh.vis_exp_datos_empleado')
            // ->where('idunidadestructura', 901)
            ->whereBetween('idunidadestructura', [901, 907])
            ->where('idcargo', 204)
            ->orderBy('idcargo')

            // ->pluck('nombre', 'idusuario');
            ->get();

        //  dump($pasantes) ;

        foreach ($pasantes as $pasante) {
            if ($this->uid === $pasante->uid) {
                return true;
            }
        }

        return false;
    }

    /**
     * Administradores de la gerencia de Tecnología
     * @return boolean
     */
    function esAdmin()
    {
        if ($this->esGerente() || $this->esJefe()) {
            return true;
        }
        return false;
    }

    /**
     * Descripción de los usuarios de la gerencia de Tecnología
     */
    function desCargo()
    {
        if ($this->esGerente()) {
            return 'Gerente';
        }
        if ($this->esJefe()) {
            return 'Jefe';
        }

        if ($this->esAnalista()) {
            return 'Analista';
        }

        if ($this->esPasante()) {
            return 'Pasante';
        }
    }

    function perteceTecnologia()
    {
        // dd( $this->unidadEstructura);
        $idunidadestructura = $this->unidadEstructura->idunidadestructura;
        if ($idunidadestructura >= 901 && $idunidadestructura <= 907) {
            return true;
        }

        return false;
    }


    /* No me esta funcionando me arroja registro en blanco  */
    /* Por los momentos lo voy a trabajar con una consulta en IncidenciaController  */
    public function incidenciasAsignadas()
    {
        return $this->hasMany(Incidencia::class, 'asignado_id', 'idusuario'); // 'asignado_id' debe ser el nombre de la columna en la tabla Incidencias que almacena el ID del usuario asignado
    }

    public function mensajes() {
        return $this->hasMany(Mensaje::class, 'user_id', 'idusuario');
    }
}

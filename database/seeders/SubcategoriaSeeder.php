<?php

namespace Database\Seeders;

use App\Models\Subcategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subcategorias = [
            [
                'nombre' => 'Actualización Sistema',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'Configuración Servicio Proxy e Internet',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'Desarrollo de Nuevas Aplicaciones',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'Fallas en Procesos Automatizados Actividad Comercial',
                'categoria_id' => 1
            ],
            [
                'nombre' => 'Investigación y Desarrollo/Sistemas',
                'categoria_id' => 1
            ],
            

            [
                'nombre' => 'Actualización de Usuarios',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Adiestramiento de Aplicaciones',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Asignación de Permisología Nuevos Usuarios de Sistema',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Eliminación de Usuario',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Carnetización',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Gestión Presidencial',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Intranet',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Merú Acceso',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Merú Administrativo',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Merú Autogestionado de Salud',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Merú Comercial',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Merú RRHH',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Página Web',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte Reportes de Aplicaciones',
                'categoria_id' => 2
            ],
            [
                'nombre' => 'Soporte SIGH',
                'categoria_id' => 2
            ],


            [
                'nombre' => 'Aplicativos de Grupos de Trabajo',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Asignación de Equipos de Computación/Equipos Electrónicos',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Asignación de Radio Móvil',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Asignación de Radio Portátil',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Asignación de Teléfono Fijo',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Asignación de Teléfono Móvil',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Problemas con Servicios de Datos',
                'categoria_id' => 3
            ],
            [
                'nombre' => 'Problemas de Red',
                'categoria_id' => 3
            ],


            [
                'nombre' => 'Adiestramiento',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Asesoría de Software',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Configuración estación de trabajo',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Falla con periférico de equipos de computación',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Instalación de Software',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Problemas Servicio Internet',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Revisión de Estación de Trabajo',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Servicio de Correo',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Servicio de Impresión',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Solicitud de Equipos Computación',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Solicitud de Toner / Consumible',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Traslado de Equipos de Computación',
                'categoria_id' => 4
            ],
            [
                'nombre' => 'Reparación de Equipos de Computación',
                'categoria_id' => 4
            ],


            [
                'nombre' => 'Servidor de Aplicaciones',
                'categoria_id' => 5
            ],
            [
                'nombre' => 'Servidor de Autenticación',
                'categoria_id' => 5
            ],
            [
                'nombre' => 'Servidor de Base de Datos',
                'categoria_id' => 5
            ],
            [
                'nombre' => 'Servidor de Correo Electrónico',
                'categoria_id' => 5
            ],
            [
                'nombre' => 'Servicio de Telefónica Fija',
                'categoria_id' => 5
            ],
        ];

        DB::table('subcategorias')->insert($subcategorias);
        
    }
}

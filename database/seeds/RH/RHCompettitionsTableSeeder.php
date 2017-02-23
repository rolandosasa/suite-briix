<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RHCompettitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Datos para la tabla Competencias
        //id:1
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Herramientas de comunicación',
            'name' => 'Comunicación escrita(español)',
            'type' => 'Competencia'
            ));
        //id:2
         \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Herramientas de comunicación',
            'name' => 'Comunicación oral(español)',
            'type' => 'Competencia'
            ));
         //id:3
          \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Herramientas de comunicación',
            'name' => 'Comunicación escrita(ingles)',
            'type' => 'Competencia'
            ));
          //id:4
           \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Herramientas de comunicación',
            'name' => 'Comunicación oral(ingles)',
            'type' => 'Competencia'
            ));
           //id:5
            \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Herramientas de comunicación',
            'name' => 'Capacidad de síntesis de información',
            'type' => 'Competencia'
            ));
            //id:6
             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Comunicación con otros',
            'name' => 'Capacidad de negociación y resolución de conflictos',
            'type' => 'Competencia'
            ));
            //id:7
             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Comunicación con otros',
            'name' => 'Entendimiento de otras culturas y costumbres',
            'type' => 'Competencia'
            ));
            //id:8
             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Comunicación con otros',
            'name' => 'Entrenar talento',
            'type' => 'Competencia'
            ));
            //id:9
             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Comunicación con otros',
            'name' => 'Dar y recibir retroalimentación',
            'type' => 'Competencia'
            ));
            //id:10
            \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Comunicación con otros',
            'name' => 'Hablar eficazmente en público',
            'type' => 'Competencia'
            ));
            //id:11
            \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Comunicación con otros',
            'name' => 'Argumentacion lógica y clara',
            'type' => 'Competencia'
            ));
           //id:12
            \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Trabajo en equipo',
            'name' => 'Distribución de tareas en el equipo de Trabajo',
            'type' => 'Competencia'
            ));

             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Trabajo en equipo',
            'name' => 'Comunicación asertiva',
            'type' => 'Competencia'
            ));

             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Trabajo en equipo',
            'name' => 'Saber escuchar a los demas',
            'type' => 'Competencia'
            ));

             \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Innovacion/Emprendimiento',
            'name' => 'Generacion de nuevas ideas',
            'type' => 'Competencia'
            ));

            \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Innovacion/Emprendimiento',
            'name' => 'Desarrollo de alianzas estrategicas',
            'type' => 'Competencia'
            ));
          \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Innovacion/Emprendimiento',
            'name' => 'Implementacion de nuevos proyectos',
            'type' => 'Competencia'
            ));

          \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Liderazgo',
            'name' => 'Confianza en si mismo',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Liderazgo',
            'name' => 'Iniciativa o productividad',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Liderazgo',
            'name' => 'Sentido de responsabilidad',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Liderazgo',
            'name' => 'Toma de decisiones de forma acertada y agil',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Imagen personal',
            'name' => 'Facilidad de palabra',
            'type' => 'Competencia'
            ));

        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Imagen personal',
            'name' => 'Puntualidad',
            'type' => 'Competencia'
            ));

        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Imagen personal',
            'name' => 'Saber tratar a un cliente',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Imagen personal',
            'name' => 'Carisma',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Imagen personal',
            'name' => 'Aspecto físico',
            'type' => 'Competencia'
            ));
        \DB::connection('cRecursos')->table('compettitions')->insert(array(
            'category' => 'Eficiencia personal',
            'name' => 'Manejo eficiente del tiempo',
            'type' => 'Competencia'
            ));

    }
}

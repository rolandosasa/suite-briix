<?php

use Illuminate\Database\Seeder;

class RHJobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Datos para la tabla Puestos
        //id:1
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Gerente General',
            'department' 	   => 'Administrativo',
            'job_description'  => 'Es el responsable ante el director general de coordinar y controlar todas las actividades administrativas de la empresa mediante la planeación, dirección, organización y control.',
            'immediate_boss'   => 'Director General',
            'supervises'       => 'Director de Compras y ventas, contador, director de producción',
            'responsabilities' => 'Supervisar',
            'salary_basic'     => '25 000.00',
            'salary_global'    => '30 000.00'
            ));
        // Id2 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Director de compras y ventas',
            'department' 	   => 'Administrativo',
            'job_description'  => 'Es el responsable de tener en existencia la materia prima necesaria para realizar el proceso de produccion, asi como de atender los pedidos de los clientes y realizar el envió de la documentación correspondiente a los agentes aduanales de los clientes.',
            'immediate_boss'   => 'Gerente General',
            'supervises'       => 'Secretaría',
            'responsabilities' => 'Atender y tomar los pedidos de los clientes',
            'salary_basic'     => '20 000.00',
            'salary_global'    => '25 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Contador',
            'department' 	   => 'Administrativo',
            'job_description'  => 'Es el encargado de dirigir y realizar todas las actividades contables de la empresa que incluyen la preparación, actualización e interpretación de los documentos contables y estados financieros, asi como otros deberes relacionados con el área de contabilidad.',
            'immediate_boss'   => 'Gerente General',
            'supervises'       => 'Secretaría',
            'responsabilities' => 'Elaborar la nomina mensual o semanal, mantener actualizados los saldos de bancos, clientes y proveedores.',
            'salary_basic'     => '18 000.00',
            'salary_global'    => '23 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Secretaría',
            'department' 	   => 'Administrativo',
            'job_description'  => 'Es la encargada de desempeñar labores de oficina en general para auxiliar a los ejecutivos en sus labores administrativas, asi como de realizar el pago en efectivo a proveedores y empleados.',
            'immediate_boss'   => 'Director de compras y ventas, Contador',
            'supervises'       => 'Portero',
            'responsabilities' => 'Efectuar el pago a los empleados de forma semanal, quincenal de acuerdo a la nomina. ',
            'salary_basic'     => '15 000.00',
            'salary_global'    => '19 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Director de producción',
            'department' 	   => 'Producción',
            'job_description'  => 'Es el encargado de coordinar la producción y la programación del trabajo en el área de producción para surtir los pedidos.',
            'immediate_boss'   => 'Gerente General',
            'supervises'       => 'Supervisor de producción, Asistente de producción y jefe de Personal.',
            'responsabilities' => 'Supervisar la calidad de los productos de los proveedores que entregan las empresas.',
            'salary_basic'     => '14 000.00',
            'salary_global'    => '16 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Supervisor de producción',
            'department' 	   => 'Producción',
            'job_description'  => 'Es el encargado de supervisar la calidad de las hortalizas que los proveedores entregan en la empresa, así como de verificar el embarque y entarimado de las cajas de su envio.',
            'immediate_boss'   => 'Director de producción',
            'supervises'       => 'Jefe de personal, Operador de maquina',
            'responsabilities' => 'Supervisar a través de los jefes de grupo para que coordinen al personal de producción.',
            'salary_basic'     => '12 000.00',
            'salary_global'    => '15 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Asistente de producción',
            'department' 	   => 'Producción',
            'job_description'  => 'Es el encargado de auxiliar al director y supervisión de producción, supervisando la calidad de los productos.',
            'immediate_boss'   => 'Director de producción',
            'supervises'       => 'Ninguno',
            'responsabilities' => 'Supervisa la carga y entrega de productos.',
            'salary_basic'     => '10 000.00',
            'salary_global'    => '13 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Jefe de personal',
            'department' 	   => 'Producción',
            'job_description'  => 'Es el encargado de supervisar y asignar tareas a los trabajadores del área de producción relacionada con la limpieza y empaque de los productos.',
            'immediate_boss'   => 'Director de producción',
            'supervises'       => 'Jefes de grupo',
            'responsabilities' => 'Supervisar que los productos se empaquen esten seleccionado de proma unifrome en cuanto a tamaño y calidad.',
            'salary_basic'     => '9 000.00',
            'salary_global'    => '12 000.00'
            ));
        // 
        \DB::connection('cRecursos')->table('jobs')->insert(array(
            'name_jobs'		   => 'Jefe de grupo',
            'department' 	   => 'Producción',
            'job_description'  => 'Es el encargado de auxiliar al jefe de personal de producción a coordinar a un grupo de trabajadores dedicados a la limpieza y empaque de los productos, asi como de supervisar su trabajo.',
            'immediate_boss'   => 'Jefe de personal',
            'supervises'       => 'Empleados de Producción',
            'responsabilities' => 'Coordinar a un grupo de trabajadores del áre de producción, dedicados a la limpieza y empaque de los productos.',
            'salary_basic'     => '8 000.00',
            'salary_global'    => '10 000.00'
            ));
        // 
       
    }
}

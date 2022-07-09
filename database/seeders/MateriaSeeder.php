<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Materia;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        DB::table('materias')->insert([

        [
            'nombre' => 'EDUCACIÓN AMBIENTAL',
            'codigo' => 'ADG-25132',
            'semestre' =>'1',
            'UC' => '2',
            'horasT' => '2',
            'horasP' => '1',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'HOMBRE, SOCIEDAD, CIENCIA Y TECNOLOGÍA',
            'codigo' => 'ADG-25123',
            'semestre' =>'1',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'INGLES I',
            'codigo' => 'IDM-24113',
            'semestre' =>'1',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DIBUJO',
            'codigo' => 'MAT-21212',
            'semestre' =>'1',
            'UC' => '2',
            'horasT' => '1',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'MATEMÁTICA I',
            'codigo' => 'MAT-21215',
            'semestre' =>'1',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'GEOMETRÍA ANALÍTICA',
            'codigo' => 'MAT-21524',
            'semestre' =>'1',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'SEMINARIO I',
            'codigo' => 'ADG-25131',
            'semestre' =>'1',
            'UC' => '1',
            'horasT' => '1',
            'horasP' => '0',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],


        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN I',
            'codigo' => 'DIN-21113',
            'semestre' =>'1',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'INGLES II',
            'codigo' => 'IDM-24123',
            'semestre' =>'2',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'QUÍMICA GENERAL',
            'codigo' => 'QUF-22014',
            'semestre' =>'2',
            'UC' => '4',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'FÍSICA I',
            'codigo' => 'QUF-23015',
            'semestre' =>'2',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '2',
            'horasL' => '2',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'MATEMÁTICA II',
            'codigo' => 'MAT-21225',
            'semestre' =>'2',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'ÁLGEBRA LINEAL',
            'codigo' => 'MAT-21114',
            'semestre' =>'2',
            'UC' => '4',
            'horasT' => '2',
            'horasP' => '4',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'SEMINARIO II',
            'codigo' => 'ADG-25141',
            'semestre' =>'2',
            'UC' => '1',
            'horasT' => '1',
            'horasP' => '0',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN II',
            'codigo' => 'DIN-21123',
            'semestre' =>'2',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'FÍSICA II',
            'codigo' => 'QUF-23025',
            'semestre' =>'3',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '2',
            'horasL' => '2',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'MATEMÁTICA III',
            'codigo' => 'MAT-21235',
            'semestre' =>'3',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
         'nombre' => 'PROBALIDIDADES Y ESTADÍSTICA',
            'codigo' => 'MAT-21414',
            'semestre' =>'3',
            'UC' => '4',
            'horasT' => '2',
            'horasP' => '4',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
         'nombre' => '´PROGRAMACIÓN',
            'codigo' => 'SYC-22113',
            'semestre' =>'3',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
         'nombre' => 'SISTEMAS ADMINISTRATIVOS',
            'codigo' => 'AGG-22313',
            'semestre' =>'3',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
         'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN III',
            'codigo' => 'DIN-21133',
            'semestre' =>'3',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'TEORÍA DE LOS SISTEMAS',
            'codigo' => 'SYC-32114',
            'semestre' =>'4',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'CÁLCULO NUMÉRICO',
            'codigo' => 'MAT-31714',
            'semestre' =>'4',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'LÓGICA MATEMÁTICA',
            'codigo' => 'MAT-31214',
            'semestre' =>'4',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'LENGUAJES DE PROGRAMACIÓN I',
            'codigo' => 'SYC-32225',
            'semestre' =>'4',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'PROCESAMIENTO DE DATOS',
            'codigo' => 'SYC-32414',
            'semestre' =>'4',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'SISTEMAS DE PRODUCCIÓN',
            'codigo' => 'AGL-30214',
            'semestre' =>'4',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN IV',
            'codigo' => 'DIN-31143',
            'semestre' =>'4',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ], 

        [
            'nombre' => 'TEORÍA DE GRAFOS',
            'codigo' => 'MAT-31104',
            'semestre' =>'5',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'LENGUAJES DE PROGRAMACIÓN II',
            'codigo' => 'SYC-32235',
            'semestre' =>'5',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'INVESTIGACIÓN DE OPERCIONES',
            'codigo' => 'MAT-30923',
            'semestre' =>'5',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'CIRCUITOS LÓGICOS',
            'codigo' => 'ELN-30514',
            'semestre' =>'5',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'ANÁLISIS DE SISTEMAS',
            'codigo' => 'SYC-32514',
            'semestre' =>'5',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'BASE DE DATOS',
            'codigo' => 'SYC-32614',
            'semestre' =>'5',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN V',
            'codigo' => 'DIN-31153',
            'semestre' =>'5',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'OPTIMIZACIÓN NO LINEAL',
            'codigo' => 'MAT-30935',
            'semestre' =>'6',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'LENGUAJES DE PROGRAMACIÓN III',
            'codigo' => 'SYC-32245',
            'semestre' =>'6',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'PROCESOS ESTOCÁSTICOS',
            'codigo' => 'MAT-31414',
            'semestre' =>'6',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'ARQUITECTURA DEL COMPUTADOR',
            'codigo' => 'SYC-30525',
            'semestre' =>'6',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DISEÑO DE SISTEMAS',
            'codigo' => 'SYC-32524',
            'semestre' =>'6',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'SISTEMAS OPERATIVOS',
            'codigo' => 'SYC-30834',
            'semestre' =>'6',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN VI',
            'codigo' => 'DIN-31163',
            'semestre' =>'6',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ], 

        [
            'nombre' => 'IMPLANTACIÓN DE SISTEMAS',
            'codigo' => 'SYC-32714',
            'semestre' =>'7',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'METODOLOGÍA DE LA INVESTIGACIÓN',
            'codigo' => 'ADG-30214',
            'semestre' =>'7',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'SIMULACIÓN Y MODELOS',
            'codigo' => 'MAT-30945',
            'semestre' =>'7',
            'UC' => '5',
            'horasT' => '4',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'REDES',
            'codigo' => 'SYC-31644',
            'semestre' =>'7',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '0',
            'horasL' => '3',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'GERENCIA DE LA INFORMÁTICA',
            'codigo' => 'ADG-30224',
            'semestre' =>'7',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN VII',
            'codigo' => 'DIN-31173',
            'semestre' =>'7',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'TEORÍA DE DECISIONES',
            'codigo' => 'MAT-31314',
            'semestre' =>'8',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'AUDITORÍA DE SISTEMAS',
            'codigo' => 'SYC-32814',
            'semestre' =>'8',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'MARCO LEGAL PARA EL EJERCICIO DE LA INGENIERÍA',
            'codigo' => 'CJU-37314',
            'semestre' =>'8',
            'UC' => '4',
            'horasT' => '4',
            'horasP' => '0',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'TELEPROCESOS',
            'codigo' => 'TTC-31154',
            'semestre' =>'8',
            'UC' => '4',
            'horasT' => '3',
            'horasP' => '3',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],

        [
            'nombre' => 'DEFENSA INTEGRAL DE LA NACIÓN VIII',
            'codigo' => 'DIN-31183',
            'semestre' =>'8',
            'UC' => '3',
            'horasT' => '2',
            'horasP' => '2',
            'horasL' => '0',
            'status' => 'Sin Profesor',
        ],
    ]);

    }
}

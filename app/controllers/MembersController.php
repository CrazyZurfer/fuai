<?php

use Faker\Factory as Faker;

class MembersController extends \BaseController {

	//no es necesario crear una tabla en la base de datos, con esto esta bien
	//este es el formato
	public $members = [
		'directive' => [
			[
				'name' => 'Manuel',
				'last_name' => 'Inostroza',
				'career' => 'Ing. Comercial',
				'position' => 'Presidente',
				'email' => 'manuel.inos77@gmail.com',
				'photo' => '',
			],
			[
				'name' => 'Barbara',
				'last_name' => 'Armijo',
				'career' => 'Derecho',
				'position' => 'Vice Presidenta',
				'email' => 'baarmijo@alumnos.uai.cl',
				'photo' => '',
			],
			[
				'name' => 'Felipe',
				'last_name' => 'Repullo',
				'career' => 'Ing. Comercial',
				'position' => 'Secretario General',
				'email' => 'frepullo@alumnos.uai.cl',
				'photo' => '',
			],
			[
				'name' => 'Roberto',
				'last_name' => 'Bravo',
				'career' => 'Ing. Comercial',
				'position' => 'Secretario de Operaciones',
				'email' => 'robbravo@alumnos.uai.cl',
				'photo' => '',
			],
			[
				'name' => 'Diego',
				'last_name' => 'Marincovich',
				'career' => 'Ing. Comercial',
				'position' => 'Finanzas',
				'email' => 'marincovich4340@gmail.com',
				'photo' => '',
			],
			[
				'name' => 'Michelle',
				'last_name' => 'Odeh',
				'career' => 'Ing. Comercial',
				'position' => 'Extension',
				'email' => 'modeh@alumnos.uai.cl',
				'photo' => '',
			],
			[
				'name' => 'Mario',
				'last_name' => 'Rodriguez',
				'career' => 'Ing. Comercial',
				'position' => 'Bienestar',
				'email' => 'msrodriguez@alumnos.uai.cl',
				'photo' => '',
			],
			[
				'name' => 'Franco',
				'last_name' => 'Dominichetti',
				'career' => 'Ing. Comercial',
				'position' => 'Acción Social',
				'email' => 'fdominichetti@gmail.com',
				'photo' => '',
			],
			[
				'name' => 'Caterina',
				'last_name' => 'Aguilar',
				'career' => 'Ing. Comercial',
				'position' => 'Comunicaciones',
				'email' => 'caterina.ao@gmail.com',
				'photo' => '',
			],
			[
				'name' => 'Amin',
				'last_name' => 'Juris',
				'career' => 'Ing. Comercial',
				'position' => 'Emprendimiento',
				'email' => 'aminjuris@live.cl',
				'photo' => '',
			],
			[
				'name' => 'Jorge',
				'last_name' => 'Vives',
				'career' => 'Ing. Comercial',
				'position' => 'Gestión Politica',
				'email' => 'jvives@alumnos.uai.cl',
				'photo' => '',
			],
			[
				'name' => 'Miguel',
				'last_name' => 'Tapia',
				'career' => 'Ing. Comercial',
				'position' => 'Deportes',
				'email' => 'mitapia@alumnos.uai.cl',
				'photo' => '',
			],
		],
		'commissions' => [
			[
				'name' => 'Emprendimiento',
				'email' => 'aminjuris@live.cl',
				'description' => 'Que es lo que hace emprendimiento?',
				'team' => [
					[
						'name' => 'Amin',
						'last_name' => 'Juris',
					],
					[
						'name' => 'Alejandro',
						'last_name' => 'Vargas',
					],
					[
						'name' => 'Cristina',
						'last_name' => 'Sanguedolce',
					],
					[
						'name' => 'Daniela',
						'last_name' => 'Bonilla',
					],
					[
						'name' => 'Estefani',
						'last_name' => 'Segura',
					],
					[
						'name' => 'Jose Tomás',
						'last_name' => 'Lineros',
					],
					[
						'name' => 'Weili',
						'last_name' => 'Lin',
					],
					[
						'name' => 'Rene',
						'last_name' => 'Garrido',
					],
					[
						'name' => 'Florencia',
						'last_name' => 'Saavedra',
					],
				]
			],
			[
				'name' => 'Comunicaciones',
				'email' => 'caterina.ao@gmail.com',
				'description' => 'Que es lo que hace comunicaiones?',
				'team' => [
					[
						'name' => 'Caterina',
						'last_name' => 'Aguilar',
					],
					[
						'name' => 'Maria Fernanda',
						'last_name' => 'Sandoval',
					],
					[
						'name' => 'Ana Elisa',
						'last_name' => 'Kuhn',
					],
					[
						'name' => 'Cristobal',
						'last_name' => 'Bravo',
					],
					[
						'name' => 'Constanza',
						'last_name' => 'Fernandez',
					],
				]
			],
			[
				'name' => 'Extensión',
				'email' => 'modeh@alumnos.uai.cl',
				'description' => 'Este si que es importante explicarlo.. no entiendo nada',
				'team' => [
					[
						'name' => 'Michelle',
						'last_name' => 'Odeh',
					],
					[
						'name' => 'Jan',
						'last_name' => 'Huber',
					],
					[
						'name' => 'Catalina',
						'last_name' => 'Ferrer',
					],
					[
						'name' => 'Sergio',
						'last_name' => 'Mulsow',
					],
					[
						'name' => 'Nicolás',
						'last_name' => 'Reyes',
					],
					[
						'name' => 'Jorge',
						'last_name' => 'Aspillaga',
					],
				]
			],
			[
				'name' => 'Acción Social',
				'email' => 'fdominichetti@gmail.com',
				'description' => 'Explicar...',
				'team' => [
					[
						'name' => 'Franco',
						'last_name' => 'Dominichetti',
					],
					[
						'name' => 'Rocio',
						'last_name' => 'Jimenez',
					],
					[
						'name' => 'Francisca',
						'last_name' => 'Vallejos',
					],
					[
						'name' => 'Francisca',
						'last_name' => 'Unda',
					],
					[
						'name' => 'Jose',
						'last_name' => 'Cifuentes',
					],
					[
						'name' => 'Francisco',
						'last_name' => 'Rodriguez',
					],
					[
						'name' => 'Ignacio',
						'last_name' => 'Greece',
					],
					[
						'name' => 'Militza',
						'last_name' => 'Colvin',
					],
					[
						'name' => 'Josefa',
						'last_name' => 'Vargas',
					],
					[
						'name' => 'Sebastian',
						'last_name' => 'Chase',
					],
					[
						'name' => 'Sebastian',
						'last_name' => 'Gorgues',
					],
					[
						'name' => 'Fransisca',
						'last_name' => 'Bahamondes',
					],
				]
			],
			[
				'name' => 'Gestión Política',
				'email' => 'jvives@alumnos.uai.cl',
				'description' => 'Explicar',
				'team' => [
					[
						'name' => 'Jorge',
						'last_name' => 'Vives',
					],
					[
						'name' => 'Luis',
						'last_name' => 'Blu',
					],
					[
						'name' => 'Sebastián',
						'last_name' => 'Rodriguez',
					],
					[
						'name' => 'Tomás',
						'last_name' => 'Sagredo',
					],
					[
						'name' => 'Nicolás',
						'last_name' => 'Fernandez',
					],
					[
						'name' => 'Juan Ernesto',
						'last_name' => 'Monterrey',
					],
					[
						'name' => 'Daniela',
						'last_name' => 'Poblete',
					],
				]
			],
			[
				'name' => 'Finanzas',
				'email' => 'marincovich4340@gmail.com',
				'description' => 'Finanzas, explicar',
				'team' => [
					[
						'name' => 'Diego',
						'last_name' => 'Marincovich',
					],
					[
						'name' => 'Gonzalo',
						'last_name' => 'Mejia',
					],
					[
						'name' => 'Alfonso',
						'last_name' => 'Lara',
					],
				]
			],
			[
				'name' => 'Bienestar',
				'email' => 'Explicar',
				'description' => 'msrodriguez@alumnos.uai.cl',
				'team' => [
					[
						'name' => 'Mario',
						'last_name' => 'Rodriguez',
					],
					[
						'name' => 'Veronica',
						'last_name' => 'Bejares',
					],
					[
						'name' => 'Arlan',
						'last_name' => 'Tirado',
					],
					[
						'name' => 'Fernanda',
						'last_name' => 'González',
					],
					[
						'name' => 'Eli',
						'last_name' => 'Brito',
					],
				]
			],
			[
				'name' => 'Inclusión',
				'email' => 'fmezapavanati@gmail.com',
				'description' => 'Que es lo que hace este equipo',
				'team' => [
					[
						'name' => 'Francisca',
						'last_name' => 'Meza',
					],
				]
			],
		],
	];

	/**
	 * Display a listing of teachers
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->members;
	}

	/**
	 * Display the specified teacher.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return $teacher;
	}

}
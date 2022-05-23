<?php

use Illuminate\Support\Facades\Route;
//dependencia al controlador
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//primera ruta en laravel
Route::get('hola', function(){
    echo "hola";
});

Route::get('arreglos', function(){
$estudiantes = ["AN" => "Ana",
                "JU" => "Juana",
                "PA" =>"Paola"];
   echo "<pre>";
   var_dump($estudiantes);
   "</pre>";
   echo "<hr/>";
   //agregar posicion
   $estudiantes[] = "cristian";
   echo "<pre>";
   var_dump($estudiantes);
   "</pre>";
   //retirar elementos de arreglos
   echo "<hr/>";
   unset($estudiantes["JU"]);
   echo "<pre>";
   var_dump($estudiantes);
   "</pre>";
});

//SEGUNDA RUTA EN LARAVEL

Route::get('paises', function(){
    $paises = [ "Colombia" =>[
                "capital" =>"Bogota",
                "moneda" =>"peso",
                "poblacion" =>51.6,
                "ciudades" =>[
                    "Bogota",
                    "Medellin",
                    "Cali"
                ]
    ], 
    "Peru" =>[
        "capital" =>"Lima",
        "moneda" =>"sol",
        "poblacion" =>32.97,
        "ciudades" =>[
            "Cusco",
            "Piura"
        ]
    ],
    "Paraguay"=>[
        "capital" =>"Asuncion",
        "moneda" =>"guarani",
        "poblacion" =>7.1,
        "ciudades" =>[
            "Ciudad del este",
        ]
    ]
    ];
 
   
    

    // foreach($paises as $pais => $infopais){
       // echo "<h1>$pais</h1>";
    //foreach($infopais as $clave => $valor){
      //  echo "$clave : $valor <br/>";

   // }
   // echo "<hr/>";

    //}

    //mostrar vista de paises
    return view("paises")
    ->with("paises",$paises);

});
Route::get('prueba', function(){
    return view('productos.new');

});

//Rutas REST
Route::resource('productos' , ProductoController::class);


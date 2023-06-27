# pruebainnclod
Esta es la prueba para innclod

INTRODUCCION
El siguiente repositorio contiene el desarrollo de la prueba. Se realizo una abstraccion del caso y se implemento una solucion por capas separando el backend del frontend. 

Se realiza la creacion de una aplicacion laravel con arquitectura MVC utilizando servicios REST para cada operacion del CRUD.  Para el front se realiza la creacion de una aplicacion web en PHP + HTML con Javascritpt y CSS3.

PRECONDICIONES
Se debe contar con composer y Laravel instalado en el servidor para correr la aplicacion. 

Se puede desplegar localmente utilizando xampp 

INSTRUCCIONES DE DESPLIEGUE 


Se debe acceder a la carpeta 
   3 cd .\laravelrestapi\
Se debe editar el archivo .env 
en la linea 14 y 15 
DB_PORT=3306
DB_DATABASE=procesos
DB_USERNAME=root
DB_PASSWORD=
 Se realiza la migracion de la bd con esto se crean las tablas necesarias 
  php artisan migrate

 Se inicia la aplicacion
 php artisan serve


Los endpoiunts y operaciones del crud son: 


Route::get('/doc_documento', 'App\Http\Controllers\DocumentoController@index');
Route::post('/doc_documento', 'App\Http\Controllers\DocumentoController@store');
Route::put('/doc_documento/{id}', 'App\Http\Controllers\DocumentoController@update');
Route::delete('/doc_documento/{id}', 'App\Http\Controllers\DocumentoController@destroy');


Route::get('/tip_documento', 'App\Http\Controllers\TipDocController@index');
Route::post('/tip_documento', 'App\Http\Controllers\TipDocController@store');

Route::get('/pro_proceso', 'App\Http\Controllers\ProcesoController@index');
Route::post('/pro_proceso', 'App\Http\Controllers\ProcesoController@store');

Una vez desplegado el backen se inicia el front desde
dashboard.php
Alli se crean los documentos


<?php 

require __DIR__ . '/route.php';
require __DIR__ . '/controller.php';


Route::run('/User','User@index');
Route::run('/User/{url}','User@profile');
Route::run('User/{id}','User@delete');

?>
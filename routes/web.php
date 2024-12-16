<?php

use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = "Montaha";
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    // return view('about')->with('name', $name);
    // return view('about', ['name' => $name]);
    return view('about', compact('name', 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'Sales',
    ];
    return view('about', compact('name', 'departments'));
});

Route::get('tasks', function () {
    return view('tasks');
});

Route::post('create', function () {
    $task_name = $_POST['name'];
    FacadesDB::table('task')->insert([
        'name' => $task_name,
    ]);
    return view('tasks');
});

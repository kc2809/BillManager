<?php

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

use App\Cons;
use App\Role;
use App\User;
use Anouar\Fpdf\Fpdf;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('foo', function () {
    return "hello laravel";
});

Route::get('user/{name}', function ($name) {
    //
    return "hello " . $name;
})->where('name', '[A-Za-z]+');

Route::get('/xin', 'MyController@XinChao');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/unauthorization', function () {
    return view('auth/unauthorization');
})->name('unauthorization');


// Admin router
Route::get('/users', 'AdminController@index')->name('users');

Route::post('/test', function (Request $request) {
    return $request->name;
    // return "wtf";

})->middleware('can:read')->name('test');

Route::get('pdf', function () {
    $fpdf = new Fpdf();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial', 'B', 16);
    $fpdf->Cell(40, 10, 'Hello World!');
    $fpdf->Output();
    exit;
});

Route::get('/aa', function () {
    // $role =  Role::create([
    //     'name' => 'admin',
    //     'permissions' => [
    //         'read' => true,
    //         'write' => true
    //     ]
    // ]);


    // Role::create([
    //     'name' => 'staff',
    //     'permissions' => [
    //         'read' => true,
    //         'write' => false,
    //     ]
    // ]);

    return 'wtf';
});

Route::post('/update-permissions', 'AdminController@updatePermission')->name('update-permissions');

Route::get('/bb', function () {
    $user = User::find(1);

    $r = $user->roles[0];

    if (!isset($r->permissions['new-per'])) {
        $x = $r->permissions;
        $x['new-per'] = false;
        $r->permissions = $x;

        $r->save();
        print(gettype($r->permissions));
        var_dump($x);
        return "luu new value";
    }

    if ($r->permissions['zz']) {
        print('co');
    } else {
        print('non');
    }

    return 'aaaa';
});

Route::get('/dd', function () {
    print(Cons::READ_PERMISSION);
    return 'aa';
})->middleware(Cons::READ_PERMISSION);

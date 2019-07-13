<?php
// use Illuminate\Routing\Route;

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
    return view('home');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('about', function () {
    return view('about');
});

// Route::get('customer', 'CustomersController@index');
// Route::get('create', 'CustomersController@create');
// Route::post('customer', 'CustomersController@store');
// Route::get('customer/{customer}', 'CustomersController@show');
// Route::get('customer/{customer}/edit', 'CustomersController@edit');
// Route::patch('customer/{customer}', 'CustomersController@update');
// Route::delete('customer/{customer}', 'CustomersController@delete');


Route::group(['middleware' => 'auth.admin', 'name' => 'customer.'],
function(){
    Route::resource('customer', 'CustomersController')->middleware('auth');
});






Route::resource('company', 'CompaniesController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function () {
    echo 'You Are Admin';
})->middleware(['auth', 'auth.admin']);

Route::group(['namespace'=>'Admin', 'prefix'=>'admin', 'middleware' => 'auth.admin'],
function(){
        Route::resource('/users','UserController',['excepts' => ['create','store','show']]);
});

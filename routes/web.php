<?php

Route::get('/', function()
{
    return view ("welcome");
});

// we willl add new route into middleware group



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/admin', 'halamanadmincontroller@index');
Route::get('/user','halamanusercontroller@index');
Route::get('/monitoring','halamanmonitoringcontroller@index');
Route::get('/monitor','monitoringcontroller@index');
Route::get('/siram','siramcontroller@index');

Route::group(['middleware' => ['web']], function () {
    Route::resource('HalamanMonitoring', 'sayurcontroller');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('kentang', 'kentangcontroller');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('kacang', 'KacangController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('ubi', 'ubicontroller');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('pengunjung', 'PengunjungController');
});
Route::group(['middleware' => ['web']], function () {
    Route::resource('andaliman', 'AndalimanController');
});

Route::resource('/jadwal', 'jadwalcontroller');
Route::resource('/cabe', 'cabecontroller');
Route::resource('/ubi', 'ubicontroller');

Route::get('upload', 'UploadsController@index');
Route::post('upload/uploadFiles', 'UploadsController@multiple_upload');
Route::get('ajaxImageUpload', ['uses'=>'AjaxImageUploadController@ajaxImageUpload']);
Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'AjaxImageUploadController@ajaxImageUploadPost']);


Route::group(['middleware' => ['web']], function() {
    Route::resource('blog','BlogController');
    Route::post ( '/editItem', 'BlogController@editItem' );
    Route::post ( '/addItem', 'BlogController@addItem' );
    Route::post ( '/deleteItem', 'BlogController@deleteItem' );
});
Route::group(['middleware' => ['web']], function() {
    Route::resource('tomat','TomatController');
});
Route::group(['middleware' => ['web']], function() {
    Route::resource('jagung','JagungController');
});
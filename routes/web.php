<?php

use Illuminate\Support\Facades\Route;

use App\name;
use App\team;
use App\Teacher;
use App\news;
use App\info;
use App\about;
use App\social;
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
    $name = name::all();
    $team = team::paginate(4);
    $teacher = Teacher::paginate(5);
    $news = news::paginate(4);
    $info = info::paginate(1);
    $about = about::paginate(4);
    $social = social::all();
    return view('welcome',[
        'name' => $name,
        'team' => $team,
        'teacher' => $teacher,
        'news' => $news,
        'info' => $info,
        'about' => $about,
        'social' => $social
    ]);
});
Route::get('/eng', function () {
    return view('eng');
});

Route::get('/ru', function () {
    return view('ru');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users', 'HomeController@users');
Route::get('/export', 'HomeController@export');
Route::get('/team1', 'HomeController@team');
Route::get('/teacher', 'HomeController@teacher');
Route::get('/newsPage', 'HomeController@news');
Route::get('/message', 'HomeController@message');
Route::get('/info', 'HomeController@info');


Route::post('/userSave', 'HomeController@addUser');
Route::post('/teamSave', 'HomeController@addTeam');
Route::post('/teacherSave', 'HomeController@addTeacher');
Route::post('/newsSave', 'HomeController@addNews');
Route::post('/infoSave', 'HomeController@addInfo');
Route::post('/aboutSave', 'HomeController@addAbout');
Route::post('/socialSave', 'HomeController@addSocial');


Route::post('/userEdit/{id}', 'HomeController@editUser');
Route::post('/teamEdit/{id}', 'HomeController@editTeam');
Route::post('/teacherEdit/{id}', 'HomeController@editTeacher');
Route::post('/newsEdit/{id}', 'HomeController@editNews');
Route::post('/infoEdit/{id}', 'HomeController@editInfo');
Route::post('/aboutEdit/{id}', 'HomeController@editAbout');
Route::post('/socialEdit/{id}', 'HomeController@editSocial');
Route::post('/siteNameEdit/{id}', 'HomeController@editSiteName');


Route::get('/deleteUser/{id}', 'HomeController@deleteUser');
Route::get('/deleteTeam/{id}', 'HomeController@deleteTeam');
Route::get('/deleteTeacher/{id}', 'HomeController@deleteTeacher');
Route::get('/deleteNews/{id}', 'HomeController@deleteNews');
Route::get('/deleteMessage/{id}', 'HomeController@deleteMessage');
Route::get('/deleteSubscriber/{id}', 'HomeController@deleteSubscriber');
Route::get('/deleteSocial/{id}', 'HomeController@deleteSocial');


Route::post('/subscribe', 'MessageController@subscribe');
Route::post('/siteName', 'HomeController@changer');
Route::post('/sendMessage', 'MessageController@send');
Route::get('/showProfile', 'HomeController@profile');
Route::get('/checkUser1/{id}', 'HomeController@checkUser1');
Route::get('/checkUser2/{id}', 'HomeController@checkUser2');
Route::get('/checkedMessage/{id}', 'HomeController@checked');
<?php

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProjetcsController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return redirect()->route('welcome');
});


Route::get('/WEBSERVICEMICRO/hs/item/load_params?key=parmsLOGmp', function () {
    return ['1' => 1];
    // $data = [
    //     "success" => true,
    //     "message" => "",
    //     "data" => [
    //         "checkurl" => "http://192.168.40.47/LOGISTIC/hs/item/",
    //         "checkurl_login" => "ClosingBalance",
    //         "checkurl_pass" => "2536369",
    //         "order_url" => "http://195.158.9.186:8181/KASSAMICRO/hs/cashier/",
    //         "order_url_login" => "Admin",
    //         "order_url_pass" => "123456"
    //     ],
    //     "error_code" => ""
    // ];
    // return json_encode($data);
});

Route::get('/', [ProjetcsController::class, 'getProjectsWeb'])->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/projects', [ProjetcsController::class, 'getProjects'])->name('projects');
    Route::post('add/project', [ProjetcsController::class, 'addProject'])->name('add_project');
    Route::get('edit/project/{id}', [ProjetcsController::class, 'editProject'])->name('edit_project');
    Route::post('update/project/{id}', [ProjetcsController::class, 'update'])->name('update_project');
    Route::get('delete/post/{id}', [ProjetcsController::class, 'deleteProject'])->name('delete_project');
    Route::get('add_project', function () {
        return view('addProject');
    });

    Route::get('/comments', [CommentController::class, 'getComments'])->name('comments');
    Route::post('add/comment', [CommentController::class, 'addComment'])->name('add_comment');
    Route::get('edit/comment/{id}', [CommentController::class, 'editComment'])->name('edit_comment');
    Route::post('update/comment/{id}', [CommentController::class, 'updateComment'])->name('update_comment');
    Route::get('delete/comment/{id}', [CommentController::class, 'deleteComment'])->name('delete_comment');
    Route::get('add_comment', function () {
        return view('addComment');
    });

    Route::get('/video', [VideoController::class, 'getVideo'])->name('video');
    Route::post('add/video', [VideoController::class, 'addVideo'])->name('add_video');
    Route::get('edit/video/{id}', [VideoController::class, 'editVideo'])->name('edit_video');
    Route::post('update/video/{id}', [VideoController::class, 'updateVideo'])->name('update_video');
    Route::get('delete/video/{id}', [VideoController::class, 'deleteVideo'])->name('delete_video');
    Route::get('add_video', function () {
        return view('addVideo');
    });

    Route::get('/clients', [ClientsController::class, 'getClients'])->name('clients');
    Route::post('add/client', [ClientsController::class, 'addClient'])->name('add_client');
    Route::get('edit/client/{id}', [ClientsController::class, 'editClient'])->name('edit_client');
    Route::post('update/client/{id}', [ClientsController::class, 'updateClient'])->name('update_client');
    Route::get('delete/client/{id}', [ClientsController::class, 'deleteClient'])->name('delete_client');
    Route::get('add_client', function () {
        return view('addClient');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

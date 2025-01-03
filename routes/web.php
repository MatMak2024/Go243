<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\IdeaCommentController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;


Route::resource('editors', EditorController::class);

Route::resource('posts', PostController::class);

Route::resource('comments', CommentController::class);

Route::resource('mentors', MentorController::class);

Route::resource('meetings', MeetingController::class);

Route::resource('ideas', IdeaController::class);

Route::resource('ideacomments', IdeaCommentController::class);


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\BookDetailsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('/');

Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // get
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/library', [LibraryController::class, 'index'])->name('perpustakaan');
    Route::get('/explore', [ExploreController::class, 'exploreView'])->name('eksplor');
    Route::get('/details/bookId={book_id}', [BookDetailsController::class, 'index'])->name('book.details');
    Route::get('/details/bookId={book_id}/userId={user_id}', [BookDetailsController::class, 'getCurrentRingkasan'])->name('getCurrentRingkasan');
    Route::get('/details/bookId={book_id}/summaryId={summary_id}', [BookDetailsController::class, 'specificSummary'])->name('summary.details');
    Route::get('/read/bookId={book_id}/summaryId={summary_id}', [SummaryController::class, 'readSummary'])->name('summary.read');

    Route::get('/details/bookId={book_id}/userId={user_id}', [BookDetailsController::class, 'getCurrentRingkasan'])->name('getCurrentRingkasan');
    Route::get('/summary/cat:{category_id}', [SummaryController::class, 'getByCategoryId'])->name('summary.category');
    Route::get('/summary/user:{user_id}', [SummaryController::class, 'getByUser'])->name('summary.user');
    Route::get('/statistics', [ProfileController::class, 'statistics'])->name('statistik');

    Route::get('/summary/delete/{summary_id}', [SummaryController::class, 'deleteSummary'])->name('summary.delete');
    Route::get('/summary/publish/{summary_id}', [SummaryController::class, 'publishSummary'])->name('summary.published');
    Route::get('/summary/draft/{summary_id}', [SummaryController::class, 'draftSummary'])->name('summary.draft');
    Route::get('/summary', [SummaryController::class, 'inputHeaderView'])->name('summary.header');
    Route::get('/summary/content/{book_id}/{summary_id}', [SummaryController::class, 'inputContentView'])->name('summary.content');
    Route::get('/summary/input/{book_id}/{summary_id}', [SummaryController::class, 'inputView'])->name('summary.input');
    Route::get('/summary/edit/{book_id}/{summary_id}/{topic_id}', [SummaryController::class, 'editTopicView'])->name('summary.edit');
    Route::get('/addbook', [BookController::class, 'inputBookView'])->name('addbook');
    Route::get('/summary/topic/delete/{topic_id}', [SummaryController::class, 'deleteTopic'])->name('topic.delete');
    Route::get('/user/delete', [ProfileController::class, 'deleteUser'])->name('user.delete');

    // post
    Route::post('/search', [ExploreController::class, 'search'])->name('search');
    Route::post('/summary/input/{book_id}/{summary_id}', [SummaryController::class, 'input'])->name('summary.input');
    Route::post('/summary', [SummaryController::class, 'inputHeader'])->name('summary.header');
    Route::post('/book-metadata', [BookController::class, 'inputBook'])->name('book.metadata');
    Route::post('/summary/edit/{book_id}/{summary_id}/{topic_id}', [SummaryController::class, 'editTopic'])->name('topic.edit');
    Route::post('/user/edit', [ProfileController::class, 'editUser'])->name('user.edit');

    Route::get('/profile-info', [ProfileController::class, 'editView'])->name('profile');
});

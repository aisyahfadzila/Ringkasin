<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Book;
use App\Models\Category;
use App\Models\Summary;
use App\Models\User;
use App\Models\Visited;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Arr;

class DashboardController extends Controller
{
    public function index()
    {
        // Riwayat Bacaan
        // Logged In User Id
        $user_id = session('user_id', null);
        // Riwayat Bacaan
        $sumsRead = [];
        if ($user_id != null) {
            $visited = Visited::select('summary_id')->where('user_id', '=', $user_id)
                ->orderBy('updated_at', 'DESC')
                ->get();
            foreach ($visited as $visit) {
                $sumsRead[] = Summary::select('summaries.id as summary_id', 'u.*', 'summaries.*', 'b.*')
                    ->join('users as u', 'u.id', '=', 'summaries.user_id')
                    ->join('books as b', 'b.id', '=', 'summaries.book_id')
                    ->where('summaries.id', '=', $visit->summary_id)->first();
            }
            foreach ($sumsRead as $sumRead) {
                $category = Book::join('categories', 'books.category_id', '=', 'categories.id')
                    ->where('books.id', '=', $sumRead->book_id)
                    ->first();
                $sumRead->category = $category->name;
            }
        }

        // Ringkasan Populer
        $populars = Summary::join('books', 'summaries.book_id', '=', 'books.id')
            ->join('users', 'summaries.user_id', '=', 'users.id')
            ->where('status', Summary::PUBLISHED)
            ->where('visits', '>', '0')
            ->orderBy('visits', 'desc')
            ->select('summaries.id as summary_id', 'summaries.*', 'users.*', 'books.*')
            ->get();

        foreach ($populars as $popular) {
            $category = Book::join('categories', 'books.category_id', '=', 'categories.id')
                ->where('books.id', '=', $popular->book_id)
                ->first();
            $popular->category = $category->name;
        }
        return view('dashboard', compact('sumsRead', 'populars'));
    }
}

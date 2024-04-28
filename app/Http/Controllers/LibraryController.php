<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Summary;
use App\Models\Book;
use App\Models\Visited;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;




class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        // Ringkasan
        $summaries = Summary::where('summaries.user_id', '=', $user_id)
            ->join('users', 'summaries.user_id', '=', 'users.id')
            ->join('books', 'summaries.book_id', '=', 'books.id')
            ->select('summaries.id as summary_id', 'summaries.*', 'users.*', 'books.*')
            ->get();
        foreach ($summaries as $summary) {
            $category = Book::join('categories', 'books.category_id', '=', 'categories.id')
                ->where('books.id', '=', $summary->book_id)
                ->first();
            $summary->category = $category->name;
        }
        return view('perpustakaan', compact('sumsRead', 'summaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

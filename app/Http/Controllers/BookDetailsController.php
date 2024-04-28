<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SummaryTopics;
use App\Models\Summary;
use App\Models\Book;


class BookDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($book_id)
    {
        // ambil data buku, harga, list peringkas serta ringkasannya
        $book = Summary::where('book_id', '=', $book_id)
            ->join('books', 'summaries.book_id', '=', 'books.id')
            ->first();

        if (empty($book)) {
            $book = Book::where('id', '=', $book_id)->first();
        }

        $category = Book::join('categories', 'categories.id', '=', 'books.category_id')
            ->where('books.id', '=', $book_id)->first();

        $otherBooks = Book::where('category_id', '=', $book->category_id)
            ->where('books.id', '!=', $book_id)
            ->get();

        $summaries = Summary::where('book_id', '=', $book_id)
            ->where('status', '=', 'published')
            ->join('users', 'summaries.user_id', '=', 'users.id')
            ->select('summaries.id as summary_id', 'summaries.*', 'users.*')
            ->get();

        return view('book-detail', compact('book', 'category', 'otherBooks', 'summaries'));
    }

    public function specificSummary($book_id, $summaries_id)
    {
        // ambil data buku, dan konten ringkasan
        $book = Summary::where('book_id', '=', $book_id)
            ->join('books', 'summaries.book_id', '=', 'books.id')
            ->first();

        $category = Book::join('categories', 'categories.id', '=', 'books.category_id')
            ->where('books.id', '=', $book_id)->first();

        $otherBooks = Book::where('category_id', '=', $book->category_id)
            ->where('books.id', '!=', $book_id)
            ->get();

        $summary = SummaryTopics::join('summaries', 'summaries.id', '=', 'summary_topics.summary_id')
            ->join('books as b', 'summaries.book_id', '=', 'b.id')
            ->where('summary_id', '=', $summaries_id)
            ->where('book_id', '=', $book_id)
            ->first();

        $summaries = Summary::where('book_id', '=', $book_id)
            ->where('status', '=', 'published')
            ->join('users', 'summaries.user_id', '=', 'users.id')
            ->select('summaries.id as summary_id', 'summaries.*', 'users.*')
            ->get();

        return view('book-detail', compact('book', 'category', 'otherBooks', 'summaries_id', 'summary', 'summaries'));
    }

    public function getCurrentRingkasan($book_id, $user_id)
    {
        $summary = Summary::where('user_id', '=', $user_id)
            ->where('book_id', '=', $book_id)
            ->first();
        $topic = SummaryTopics::where('summary_id', '=', $summary->id)->first();

        if (!empty($topic)) {
            return response()->json(['status' => 'success', 'data' => $topic]);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'failed to get current ringkasan']);
        }

    }
}

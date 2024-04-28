<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Book;
use App\Models\Summary;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExploreController extends Controller
{
    public function search(Request $req)
    {
        $q = 'select s.id as summary_id, s.*, b.*, u.*, c.*
        from summaries s
        join books b on b.id = s.book_id
        join users u on s.user_id = u.id
        join categories c on b.category_id = c.id
        where
        b.title like lower(\'%' . $req->key . '%\') and s.status = "published"
        or lower(u.fullname) like lower(\'%' . $req->key . '%\') and s.status = "published"
        or lower(c.name) like lower(\'%' . $req->key . '%\') and s.status = "published"';
        $summaries = DB::select($q);
        if ($req->key != "" ) {
            return view('eksplor-search', [
                'heading' => 'Hasil Pencarian',
                'summaries' => $summaries
            ]);
        } else {
            return redirect()->route('eksplor');

        }

    }
    public function exploreView(): View
    {
        $categories = Category::all();
        $books = Book::all();
        foreach ($books as $book) {
            $category = Book::join('categories', 'books.category_id', '=', 'categories.id')
                ->where('books.id', '=', $book->id)
                ->first();
            $book->category = $category->name;
        }

        $popularAuthors = Summary::join('users', 'users.id', '=', 'summaries.user_id')
        ->groupBy('users.id')
        ->orderBy('visits', 'desc')->get();;

        return view("eksplor", compact('categories', 'books', 'popularAuthors'));
    }
}

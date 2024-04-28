<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;


class BookController extends Controller
{

    public function inputBookView(): View
    {
        $categories = Category::all();

        return view('book.input', ["categories" => $categories]);
    }

    public function inputBook(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'total-page' => 'required|numeric',
            'publication-year' => 'required|numeric',
            'isbn' => 'required',
            'category' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        $cover = "";
        try {
            $cover = ImageController::storeImage($request->file('cover'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'total_page' => $request->input('total-page'),
            'publication_year' => $request->input('publication-year'),
            'isbn' => $request->input('isbn'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
            'cover' => $cover,
        ]);

        return redirect()->route("summary.header");
    }
}

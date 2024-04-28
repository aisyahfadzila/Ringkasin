<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Summary;
use App\Models\User;


class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (Session::has('user_id')) {
            return redirect()->route('dashboard');
        }
        $books = Summary::join('books', 'books.id', '=', 'summaries.book_id')
            ->groupBy('books.id')
            ->orderBy('summaries.visits', 'desc')->take(3)->get();

        $users = Summary::join('users', 'users.id', '=', 'summaries.user_id')
            ->groupBy('users.id')
            ->orderBy('visits', 'desc')->take(4)->get();

        $faqs = [
            'Apa itu Ringkasin?',
            'Kenapa harus Ringkasin?',
            'Bagaimana cara membaca buku?',
            'Bagaimana cara merangkum buku?',
        ];

        $answers = [
            'Ringkasin adalah sebuah platform baca rangkuman digital yang memiliki tujuan memudahkan orang mendapatkan informasi dari sebuah buku tanpa harus membaca ratusan halaman.',
            'Karena Ringkasin merupakan aplikasi dengan bahasa Indonesian-Friendly dan mudah dipahami.',
            'Anda bisa mengklik buku yang anda ingin baca lalu pilih peringkas yang menurut anda menarik. Setelah itu anda bisa lanjut membaca dengan mengklik tombol.',
            'Anda bisa mengklik icon tulis atau pergi ke laman eksplor lalu klik tombol mulai tulis. Setelah itu anda diarahkan untuk memilih buku. Sebelum memilih buku, anda harus menambahkan foto profil terlebih dahulu.'
        ];

        return view('welcome', compact('books', 'users', 'faqs', 'answers'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models;
use App\Models\Category;
use App\Models\Summary;
use App\Models\Visited;
use App\Models\User;
use App\Models\SummaryTopics;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;


class SummaryController extends Controller
{
    public function deleteTopic(Request $req, $topicId)
    {
        SummaryTopics::where("id", $topicId)->delete();
        return back();
    }

    public function inputContentView(Request $request, $book_id, $summary_id): View
    {
        $book = Book::find($book_id);
        $summaryStatus = Summary::find($summary_id)['status'];
        $topics = SummaryTopics::where("summary_id", $summary_id)->get();
        $topicsData = [];

        foreach ($topics as $topic) {
            $topicData = [
                'id' => $topic->id,
                'title' => $topic->title,
                'content' => $topic->content,
            ];

            array_push($topicsData, $topicData);
        }

        return view(
            'summary.content',
            [
                "book_id" => $book_id,
                "book" => $book,
                "summary_status" => $summaryStatus,
                "topics" => $topicsData,
                "summary_id" => $summary_id
            ],
        );
    }

    public function inputContent(Request $request)
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

        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'total_page' => $request->input('total-page'),
            'publication_year' => $request->input('publication-year'),
            'isbn' => $request->input('isbn'),
            'category_id' => $request->input('category'),
            'description' => $request->input('description'),
        ]);

        return redirect()->back()->with('message', 'Book data submitted successfully!');
    }

    public function inputHeaderView(): View
    {
        $user_id = session('user_id', null);
        $books = Book::pluck('id', 'title')->toArray();
        $user = User::where('id', '=', $user_id)->first();
        return view('summary.header', ["books" => $books, "user" => $user]);
    }

    public function inputView($summary_id, $book_id): View
    {
        return view('summary.input', ['summary_id' => $summary_id, 'book_id' => $book_id]);
    }
    public function editTopicView($summary_id, $book_id, $topic_id): View
    {
        $topic = SummaryTopics::findOrFail($topic_id);
        return view('summary.edit', ['title' => $topic->title, 'content' => $topic->content, 'summary_id' => $summary_id, 'book_id' => $book_id, 'topic_id' => $topic_id]);
    }
    public function editTopic(Request $req, $summary_id, $book_id, $topic_id)
    {
        $topic = SummaryTopics::findOrFail($topic_id);
        $topic->title = $req->title;
        $topic->content = $req->content;
        $topic->save();

        return redirect()->route(
            'summary.content',
            [
                'book_id' => $book_id,
                'summary_id' => $summary_id
            ]
        );
    }
    public function input(Request $request, $summary_id, $book_id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        SummaryTopics::create([
            'summary_id' => $summary_id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route(
            'summary.content',
            [
                "book_id" => $book_id,
                "summary_id" => $summary_id
            ]
        );
    }
    public function inputHeader(Request $request)
    {

        $user_id = session('user_id', null);
        $exist = Summary::where('book_id', '=', $request->input('book-id'))
            ->where('user_id', '=', $user_id)->first();
        if (empty($exist)) {
            $summary = Summary::create([
                'user_id' => $user_id,
                'book_id' => $request->input('book-id'),
                'status' => Summary::DRAFT
            ]);
            return response()->json(['status' => 'success', 'book_id' => $request->input('book-id'), 'sum_id' => $summary->id]);
        }
        return response()->json(['status' => 'error', 'message' => 'Anda sudah meringkas buku ini.']);
    }
    public function deleteSummary($summary_id)
    {
        Summary::where("id", $summary_id)->delete();
        return redirect('/library');
    }
    public function getByCategoryId($category_id)
    {
        $summaries = Book::select('books.id as book_id', 'books.*', 'c.*')
            ->join('categories as c', 'c.id', '=', 'books.category_id')
            ->where('books.category_id', $category_id)
            ->get();
        $category = Category::find($category_id);
        return view('eksplor-search', ['summaries' => $summaries, 'heading' => $category->name]);
    }
    public function getByUser($user_id)
    {
        $summaries = Summary::select('summaries.id as summary_id', 'summaries.*', 'b.*', 'c.*', 'u.*')
            ->join('users as u', 'u.id', '=', 'summaries.user_id')
            ->join('books as b', 'b.id', '=', 'summaries.book_id')
            ->join('categories as c', 'c.id', '=', 'b.category_id')
            ->where('summaries.user_id', '=', $user_id)
            ->where('summaries.status', '=', 'published')
            ->get();
        $category = User::find($user_id);
        return view('eksplor-search', ['summaries' => $summaries, 'heading' => "Oleh " . $category->fullname]);
    }
    public function publishSummary($summary_id)
    {
        $summary = Summary::find($summary_id);
        $summary->status = Summary::PUBLISHED;
        $summary->save();

        return back();
    }
    public function draftSummary($summary_id)
    {
        $summary = Summary::find($summary_id);
        $summary->status = Summary::DRAFT;
        $summary->save();

        return back();
    }
    public function readSummary($book_id, $summary_id)
    {

        $user_id = session('user_id', null);
        if ($user_id != null) {
            $visited = Visited::updateOrCreate(
                ['user_id' => $user_id, 'summary_id' => $summary_id],
                ['updated_at' => now()]
            );
            $visited->touch();

            if ($visited->wasRecentlyCreated) {
                $summary = Summary::find($summary_id);
                $summary->visits += 1;
                $summary->save();
            }
        }


        $book = Book::where('id', '=', $book_id)->first();
        $topics = SummaryTopics::where('summary_id', '=', $summary_id)->paginate(1);
        $topicTitles = SummaryTopics::where('summary_id', '=', $summary_id)->get();
        return view('summary.read', compact('book', 'topics', 'topicTitles'));
    }

}

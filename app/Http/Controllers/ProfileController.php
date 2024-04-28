<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Summary;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function statistics() {
        $user_id = session('user_id', null);
        $summaries = Summary::where('user_id', '=', $user_id)
        ->where('status', '=', 'published')
        ->join('books', 'books.id', '=', 'summaries.book_id')
        ->select('summaries.id as summary_id', 'summaries.*', 'books.*')
        ->get();
        return view('statistik', compact('summaries'));
    }

    public function editView(): View
    {
        $user = User::findOrFail(session("user_id", null));
        return view('profile', ['user' => $user]);
    }
    public function editUser(Request $req)
    {
        $user = User::findOrFail(session("user_id", null));
        $user->fullname = $req->fullname;
        $user->username = $req->username;
        $user->email = $req->email;
        $logo = "";
        try {
            $logo = ImageController::storeImage($req->file('logo'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        // dd($logo);
        $user->profile_logo = $logo;
        session(['profile_logo' => $logo]);
        $user->save();



        return view('profile', ['user' => $user]);
    }
    public function deleteUser()
    {

        $user = User::find(session("user_id", null));
        $user->delete();
        return redirect('/logout');
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

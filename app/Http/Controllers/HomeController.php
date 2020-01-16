<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Update an existing user instance after a valid submission.
     *
     * @param array $data
     * @return \App\User
     */
    protected function update(Request $request)
    {
        $validatedData = $request->validate([
            'webhook_url' => ['nullable', 'url', 'max:255'],
        ]);
        $currentUserId = Auth::id();
        User::whereId($currentUserId)->update($validatedData);

        return redirect('/home')->with('status', 'Webhook Updated Successfully');

    }
}

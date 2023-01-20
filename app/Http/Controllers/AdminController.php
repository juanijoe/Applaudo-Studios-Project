<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        $user = $request->user('admin');

        if ($user == null) {
            return redirect(route('login.admin'))->with('user', $user);
        }
        $url = 'admin';
        return view('admin.home', compact('user', 'url'));
    }
}

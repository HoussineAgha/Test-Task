<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        $note= Note::where('user_id', 1)->orderByDesc('created_at')->paginate(9);
        return view('index',compact('note'));
    }
}

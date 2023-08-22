<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Repository\NotesRepo;
use Illuminate\Support\Facades\Validator;

class NotController extends Controller
{

    public function index()
    {
        $allNote = Note::orderByDesc('created_at')->paginate(20);
        return view('back.all-note',compact('allNote'));
    }
    public function store(NotesRepo $notesrepo)
    {
        $result = $notesrepo->createnote();
        return $result;
    }

    public function edite(Note $note)
    {
        return view('back.modules.edit-note',compact('note'));
    }

    public function update(Note $note , NotesRepo $notesrepo)
    {

        $result = $notesrepo->updatenote($note);
        return $result;
    }

    public function destory(Note $note , NotesRepo $notesrepo)
    {
        $result = $notesrepo->deletenote($note);
        return $result;
    }





}

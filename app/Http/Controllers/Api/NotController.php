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
    public function store(NotesRepo $notesrepo)
    {
        $result = $notesrepo->createnote();
        return $result;
    }

    public function edite()
    {
        //
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

<?php
namespace App\Repository;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Note;
use Auth;
use Illuminate\Support\Facades\Request;

class NotesRepo
{
    /**
     *
     * @return Note
     */
    public function createnote()
    {
        try {
        //validate
        $DataValidate = Validator::make(request()->all(),[
            'description'=>'required',
            'image'=>'sometimes|nullable|mimes:png,jpg,jpeg|max:100000'
        ]);
        if($DataValidate->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Something went wrong, try again',
                'error'=> $DataValidate->errors()
            ],401);
        }


        if(request()->hasFile('image')){
            $path='/storage/'.request()->file('image')->store('image_note',['disk'=>'public']);
        }

        $newNote = new Note();
        $newNote ->description = request()->description;
        $newNote->image = $path ?? null;
        $newNote->user_id = Auth::user()->id;
        $newNote->save();

        if (Request::is('api/*')) {
            return response()->json([
                'status' => true,
                'message' => 'Note Add Successfuly',
            ],200);
            exit();
        }else{
            flash('Note Add Successfuly')->success();
            return back();
            exit();
        }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }

    public function updatenote($note)
    {
        try {
            //validate
            $DataValidate = Validator::make(request()->all(),[
                'description'=>'required',
                'image'=>'mimes:png,jpg,jpeg,webp|max:10000'
            ]);
            if($DataValidate->fails()){
                return response()->json([
                    'status'=>false,
                    'message'=>'Something went wrong, try again',
                    'error'=> $DataValidate->errors()
                ],401);
            }

            if(request()->hasFile('image')){
                $path='/storage/'.request()->file('image')->store('image_note',['disk'=>'public']);
            }else{
                $path = $note->image;
            }

            $note->description = request()->description;
            $note->image = $path;
            $note->save();
            if (Request::is('api/*')) {
                return response()->json([
                    'status' => true,
                    'message' => 'Note Update Successfuly',
                ],200);
                exit();
            }else{
                flash('Note Update Successfuly')->success();
                return back();
                exit();
            }

        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }

    public function deletenote($note)
    {
        try {
            $note->delete();
            if (Request::is('api/*')) {
                return response()->json([
                    'status' => true,
                    'message' => 'Note delete Successfuly',
                ],200);
                exit();
            }else{
                flash('Note delete Successfuly')->success();
                return back();
                exit();
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>false,
                'message'=>$th->getMessage(),
            ],500);
        }
    }



}

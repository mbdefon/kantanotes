<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Category;

class NoteController extends Controller
{
    //------Views------
    public function create_view(Request $request){
        $categories = Category::where('user_id',$request->user()->id)->get();
        return view('note.create',['categories' => $categories]);
    }

    public function index(Request $request, $id){
        $notes = Note::where('category_id',$id)->get();
        if ($id !=0 ) {
            $category = Category::where('id', $id)->first();
        } else {
            $category = "";
        }
        return view('note.index',['notes' => $notes,'category' => $category]);
    }
    public function display(Request $request, $id){
        $note = Note::where('id',$id)->first();
        if ($note->category_id !=0 ) {
            $category = Category::where('id', category_id)->first();
        } else {
            $category = "";
        }
        return view('note.display',['note' => $note,'category' => $category]);
    }

    //------Functions----

    public function create(Request $request){
        $this->validate($request, [
            'title'         => 'required|max:255',
            'description'       => 'required',
            'category_id'       => 'required|integer',
        ]);
        $note = new Note($request->all());
        $note->user_id = $request->user()->id;
        $note->save();

        return redirect('/')->with('status', 'Note created!');
    }




}
